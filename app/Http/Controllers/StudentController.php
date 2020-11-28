<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\UnverifiedAdviser;
use App\VerifiedAdviser;
use App\UnverifiedStudent;
use App\VerifiedStudent;
use App\SelectedCourse;
use App\CompletedCourses;
use App\Terms;
use App\S_Session;
use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use URL;

class StudentController extends Controller
{
    /*****************
     * 
     * Function:    index
     * 
     * Description: Display welcome/login page (index)
     * 
     *****************/
    public function index(){
        $user = Auth::guard('student')->user();
        
        if(isset($user)){
            return redirect('/student/home');
        }
        else{
            return view('student.welcome');
        }
    }

    /*****************
     * 
     * Function:    storeLogin
     * 
     * Description: Authenticate credentials and create a new record in Session table and use that record to persist their login
     * 
     *****************/
    public function storeLogin(){
        // Client-side validation
        request()->validate([
            'Email' => ['required', 'email'],
            'Password' => ['required']
        ]);

        // Check if user exists (verified)
        $user = VerifiedStudent::where('EMAIL', request('Email'))->first();

        if(isset($user) && ! empty($user)){
            // Email exists in the VerifiedStudent table, now check if password matches
            if(Hash::check(request('Password'), $user->HASH_PW)){
                // Create a record in S_Session and login user
                $session = new S_Session;
                $session->student_id = $user->SID;
                $session->title = $user->TITLE;
                $session->first_name = $user->FIRST_NAME;
                $session->mi = $user->MI;
                $session->last_name = $user->LAST_NAME;
                $session->suffix = $user->SUFFIX;
                $session->email = $user->EMAIL;
                $session->session_date = Carbon::today()->toDateString();               
                $session->save();
                Auth::guard('student')->login($session);
                
                // dd($session);

                // Send to student home page
                return redirect('/student/home');
            }
            else{
                // Email and password don't match
                return redirect('/student')->withErrors('Email and password do not match.');
            }
        }
        // User was not found in VerifiedStudent table, so redirect to welcome page
        else{            
            $user = UnverifiedStudent::where('EMAIL', request('Email'))->first();

            // Check if email exists in UnverfiedStudent table
            if(isset($user) && ! empty($user)){
                return redirect('/student')->withErrors('An unverified account with that email exists in our records. Please check your inbox for a confirmation email or request that we resend the confirmation email.');
            }
            // User does not exist in UnverfiedStudent table
            else{
                return redirect('student')->withErrors('An account with that email does not exist. Please create a new account if you wish to proceed.');
            }
        }
    }

    /*****************
     * 
     * Function:    logout
     * 
     * Description: Logout
     * 
     *****************/
    public function logout(){
        Auth::guard('student')->logout();

        return redirect('/student');
    }

    /*****************
     * 
     * Function:    createRegister
     * 
     * Description: Show the registration page where new students enter their information
     * 
     *****************/
    public function createRegister(){
        return view('student.register');
    }

    /*****************
     * 
     * Function:    storeRegister
     * 
     * Description: Create new unverified account and send verification email
     * 
     *****************/
    public function storeRegister(){
        request()->validate([
            'FirstName' => ['required'],
            'LastName' => ['required'],
            'StudentID' => ['required', 'digits:9'],
            'Email' => ['required', 'email'],
            'Password' => ['required']
        ]);

        // Check if an account already exists with the provided email
        $unverified_exists = new UnverifiedStudent;
        $unverified_exists = UnverifiedStudent::where('EMAIL', request('Email'))->first();

        $verified_exists = new VerifiedStudent;
        $verified_exists = VerifiedStudent::where('EMAIL', request('Email'))->first();

        // $unverified_exists and/or $verified_exists is null if email is NOT found in their respective tables
        if((isset($unverified_exists) && !empty($unverified_exists)) || (isset($verified_exists) && !empty($verified_exists))){
            // Then, do NOT create a new account, and display an error message
            $error = 'An account already exists with that email address.';
            return redirect('/student/register')->withErrors($error);
        }
        else{
            // Otherwise, create a new 'unverified' student entry
            $verificationToken = Str::random(40);
            $unverified_pw = request('Password');

            // Check if 'Other' was selected for 'Title'
            if(request('Title') == 'Other'){
                $title = request('OtherTitle');
            }
            else{
                $title = request('Title');
            }

            $newEntry = UnverifiedStudent::create([
                'TITLE' => $title,
                'FIRST_NAME' => request('FirstName'),
                'MI' => request('MI'),
                'LAST_NAME' => request('LastName'),
                'SUFFIX' => request('Suffix'),
                'SID' => request('StudentID'),
                'EMAIL' => request('Email'),
                'HASH_PW' => Hash::make($unverified_pw),
                'CREATED' => Carbon::now(),
                'UPDATED' => Carbon::now(),
                'VERIFICATION_TOKEN' => $verificationToken
            ]);
        }

        // Send verification email
        Mail::to(request('Email'))->send(new ConfirmationMail($newEntry));

        return redirect('/student/confirmation')->with([
            'email' => request('Email')
        ]);
    }

    /*****************
     * 
     * Function:    createConfirmation
     * 
     * Description: Show the confirmation page that notifies the user that a verification link has been sent to their email
     * 
     *****************/
    public function createConfirmation(){

        return view('student.confirmation');
    }

    /*****************
     * 
     * Function:    verifyEntry
     * 
     * Description: Verify the entry's email address
     * 
     *****************/
    public function verifyEntry($token){
        $unverified = UnverifiedStudent::where('VERIFICATION_TOKEN', $token)->first();

        if(isset($unverified) && !empty($unverified)){
            if(! $unverified->isVerified()){
                $unverified->EMAIL_VERIFIED = Carbon::now();
                $unverified->save();
                $status = 'Your email address has been verified. You can now log in.';

                // Create VerifiedStudent entry now
                $verified = VerifiedStudent::create([
                    'TITLE' => $unverified->TITLE,
                    'FIRST_NAME' => $unverified->FIRST_NAME,
                    'MI' => $unverified->MI,
                    'LAST_NAME' => $unverified->LAST_NAME,
                    'SUFFIX' => $unverified->SUFFIX,
                    'SID' => $unverified->SID,
                    'EMAIL' => $unverified->EMAIL,
                    'HASH_PW' => $unverified->HASH_PW,
                    'CREATED' => Carbon::now(),
                    'UPDATED' => Carbon::now(),
                ]);
            }
            else{
                $status = 'Your email address is already verified. You can now log in.';
            }
        }
        else{
            return redirect('/')->with('warning', 'Sorry, your email address cannot be identified. Please contact onlineadvising@csudh.edu');
        }

        // NEED TO ADD SESSION 'STATUS' (right now, it doesn't do/display anything)
        return redirect('/')->with('status', $status);
    }

    /*****************
     * 
     * Function:    createHome
     * 
     * Description: Display the student-specific homepage
     * 
     *****************/
    public function createHome(){
        $user = Auth::guard('student')->user();
        $selectedCourses = SelectedCourse::where('STUDENT_ID', $user->student_id)
                            ->orderByDesc('TERM')->get(); // Need to alter tables to sort by term properly!
        $allCourses = Course::select('COURSE_ABBR', 'COURSE_NAME')->pluck('COURSE_NAME', 'COURSE_ABBR');
        $completedCourses = CompletedCourses::select('COURSE_ABBR', 'COURSE_NAME')->where('STUDENT_ID', $user->student_id)->pluck('COURSE_NAME', 'COURSE_ABBR');

        $remainingCourses = $allCourses->diff($completedCourses);

        //dd($selected);

        //dd($completedCourses);
        //dd($allCourses);
        //dd($courses);

        $terms = Terms::all();

        return view('student.home')->with('user', $user)->with('selectedCourses', $selectedCourses)->with('remainingCourses', $remainingCourses)->with('terms', $terms)->with('completedCourses', $completedCourses);
    }

    /*****************
     * 
     * Function:    storeHome
     * 
     * Description: Store student's course preferences and refresh the page
     * 
     *****************/
    public function storeHome(){
        request()->validate([
            'Term' => ['required'],
            'Year' => ['required'],
            'Course1' => ['required']
        ]);

        $user = Auth::guard('student')->user();

        //Format Term to include term AND year
        /*
        $term_year = request('Term');
        $term_year += ' ';
        $term_year += request('Year');
        */
        $term_year = request('Term').' '.request('Year');

        // Add Course1
        $courseName = Course::where('COURSE_ABBR', request('Course1'))->first();
        $student_courses = SelectedCourse::updateOrCreate(
            ['STUDENT_ID' => $user->student_id, 'COURSE_ABBR' => request('Course1'), 'COURSE_NAME' => $courseName->COURSE_NAME],
            ['TERM' => $term_year, 'ADDED_AT' => Carbon::now()]        
        );

        // Make sure the courses being added are unique
        if(request('Course2') != NULL){
            if(request('Course2') != request('Course1')){
                $courseName = Course::where('COURSE_ABBR', request('Course2'))->first();

                $student_courses = SelectedCourse::updateOrCreate(
                    ['STUDENT_ID' => $user->student_id, 'COURSE_ABBR' => request('Course2'), 'COURSE_NAME' => $courseName->COURSE_NAME],
                    ['TERM' => $term_year, 'ADDED_AT' => Carbon::now()]        
                );
            }
        }
        if(request('Course3') != NULL){
            if((request('Course3') != request('Course2')) && (request('Course3') != request('Course1'))){
                $courseName = Course::where('COURSE_ABBR', request('Course3'))->first();
                
                $student_courses = SelectedCourse::updateOrCreate(
                    ['STUDENT_ID' => $user->student_id, 'COURSE_ABBR' => request('Course3'), 'COURSE_NAME' => $courseName->COURSE_NAME],
                    ['TERM' => $term_year, 'ADDED_AT' => Carbon::now()]        
                );
            }
        }
        if(request('Course4') != NULL){
            if((request('Course4') != request('Course3')) && (request('Course4') != request('Course2')) && (request('Course4') != request('Course1'))){
                $courseName = Course::where('COURSE_ABBR', request('Course4'))->first();
                
                $student_courses = SelectedCourse::updateOrCreate(
                    ['STUDENT_ID' => $user->student_id, 'COURSE_ABBR' => request('Course4'), 'COURSE_NAME' => $courseName->COURSE_NAME],
                    ['TERM' => $term_year, 'ADDED_AT' => Carbon::now()]        
                );
            }
        }
        if(request('Course5') != NULL){
            if((request('Course5') != request('Course4')) && (request('Course5') != request('Course3')) && (request('Course5') != request('Course2')) && (request('Course5') != request('Course1'))){
                $courseName = Course::where('COURSE_ABBR', request('Course5'))->first();
                
                $student_courses = SelectedCourse::updateOrCreate(
                    ['STUDENT_ID' => $user->student_id, 'COURSE_ABBR' => request('Course5'), 'COURSE_NAME' => $courseName->COURSE_NAME],
                    ['TERM' => $term_year, 'ADDED_AT' => Carbon::now()]        
                );
            }
        }

        return redirect('/student/home');
    }

}

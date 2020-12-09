<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\VerifiedAdviser;
use App\UnverifiedAdviser;
use App\VerifiedStudent;
use App\A_Session;
use App\CompletedCourses;
use App\SelectedCourse;
use App\Terms;
use App\Mail\AdviserConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use URL;

class AdviserController extends Controller
{
    /*****************
     * 
     * Function:    index
     * 
     * Description: Display welcome/login page
     * 
     *****************/
    public function index(){
        // Check if user is already logged in
        $user = Auth::guard('adviser')->user();

        // If so, redirect to adviser home page
        if(isset($user)){
            return redirect('/adviser/home');
        }
        else return view('adviser.welcome');
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

        // Check if user exists(verified)
        $user = VerifiedAdviser::where('EMAIL', request('Email'))->first();
        
        if(isset($user) && ! empty($user)){
            // Email exists in VerifiedAdviser, now check password
            if(Hash::check(request('Password'), $user->HASH_PW)){
                // Create a new session in A_Session and login user
                $session = new A_Session;
                $session->adviser_id = $user->ADVISER_ID;
                $session->title = $user->TITLE;
                $session->first_name = $user->FIRST_NAME;
                $session->mi = $user->MI;
                $session->last_name = $user->LAST_NAME;
                $session->suffix = $user->SUFFIX;
                $session->email = $user->EMAIL;
                $session->session_date = Carbon::today()->toDateString();               
                $session->save();
                Auth::guard('adviser')->login($session);

                // Send to adviser home page
                return redirect('/adviser/home');
            }
            // Password does not match
            else{
                return redirect('/adviser')->withErrors('Email and password do not match.');
            }
        }
        // Email does not exist in VerifiedAdviser table. Check UnverifiedAdviser table
        else{
            $user = UnverifiedAdviser::where('EMAIL', request('Email'))->first();

            // Check if email exists in UnverifiedAdviser table
            if(isset($user) && ! empty($user)){
                return redirect('/adviser')->withErrors('An unverified account with that email exists in our records. Please check your inbox for a confirmation email or request that we resend the confirmation email.');                
            }
            // User does not exist in UnverifiedAdviser table
            else{
                return redirect('/adviser')->withErrors('An account with that email does not exist. Please create a new account if you wish to proceed.');
            }
        }
    }

    /*****************
     * 
     * Function:    createRegister
     * 
     * Description: Show the registration page where new advisers enter their information
     * 
     *****************/
    public function createRegister(){
        return view('adviser.register');
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
            'Email' => ['required', 'email'],
            'Department' => ['required'],
            'Office' => ['required'],
            'Password' => ['required']
        ]);

        // Check if adviser account already exists with given email
        $unverfiedExists = new UnverifiedAdviser;
        $unverifiedExists = UnverifiedAdviser::where('EMAIL', request('Email'))->first();
        
        $verifiedExists = new VerifiedAdviser;
        $verifiedExists = VerifiedAdviser::where('EMAIL', request('Email'))->first();

        // Enters "if" block if account with given email is found
        if((isset($unverifiedExists) && !empty($unverifiedExists)) || (isset($verifiedExists) && !empty($verifiedExists))){
            $error = 'An account already exists with that email address.';
            return redirect('/adviser/register')->withErrors($error);
        }
        // Otherwise, register new account with the given email
        else{
            $verificationToken = Str::random(40);

            // Check if 'Other' was selected for 'Title'
            if(request('Title') == 'Other'){
                $title = request('OtherTitle');
            }
            else{
                $title = request('Title');
            }

            $newEntry = UnverifiedAdviser::create([
                'TITLE' => $title,
                'FIRST_NAME' => request('FirstName'),
                'MI' => request('MI'),
                'LAST_NAME' => request('LastName'),
                'SUFFIX' => request('Suffix'),
                'EMAIL' => request('Email'),
                'DEPARTMENT' => request('DEPARTMENT'),
                'OFFICE' => request('OFFICE'),
                'HASH_PW' => Hash::make($unverified_pw),
                'CREATED' => Carbon::now(),
                'UPDATED' => Carbon::now(),
                'VERIFICATION_TOKEN' => $verificationToken
            ]);

            // Send confirmation email
            Mail::to(request('Email'))->send(new AdviserConfirmationMail($newEntry));

            return redirect('/adviser/confirmation')->with([
                'email' => request('Email')
            ]);
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
        Auth::guard('adviser')->logout();

        return redirect('/adviser');
    }

    /*****************
     * 
     * Function:    createConfirmation
     * 
     * Description: Show the confirmation page that notifies the user that a verification link has been sent to their email
     * 
     *****************/
    public function createConfirmation(){
        return view('adviser.confirmation');
    }

    /*****************
     * 
     * Function:    verifyEntry
     * 
     * Description: Verify the entry's email address
     * 
     *****************/
    public function verifyEntry($token){
        // Logout any users that happen to be logged in
        Auth::guard('adviser')->logout();

        $unverified = UnverifiedAdviser::where('VERIFICATION_TOKEN', $token)->first();

        if(isset($unverified) && !empty($unverified)){
            if(! $unverified->isVerified()){
                $unverified->EMAIL_VERIFIED = Carbon::now();
                $unverified->save();
                $status = 'Your email address has been verified. You can now log in.';

                // Create a VerifiedAdviser account
                $verified = VerifiedAdviser::create([
                    'TITLE' => $unverified->TITLE,
                    'FIRST_NAME' => $unverified->FIRST_NAME,
                    'MI' => $unverified->MI,
                    'LAST_NAME' => $unverified->LAST_NAME,
                    'SUFFIX' => $unverified->SUFFIX,
                    'EMAIL' => $unverified->EMAIL,
                    'DEPARTMENT' => $unverified->DEPARTMENT,
                    'OFFICE' => $unverified->OFFICE,
                    'HASH_PW' => $unverified->HASH_PW,
                    'CREATED' => Carbon::now(),
                    'UPDATED' => Carbon::now()
                ]);
            }
            else{
                $status = 'Your email address is already verified. You can now log in.';
            }
        }
        else{
            return redirect('/adviser')->with('warning', 'Sorry, your email address cannot be identified. Please contact onlineadvising@csudh.edu');
        }

        // Redirect to login/welcome page
        return redirect('/adviser')->with('status', $status);
    }

    /*****************
     * 
     * Function:    createHome
     * 
     * Description: Display home page
     * 
     *****************/
    public function createHome(){
        return view('adviser.home');
    }

    /*****************
     * 
     * Function:    storeHome
     * 
     * Description: Get Student ID from adviser and check if it is valid
     * 
     *****************/
    public function storeHome(){
        request()->validate([
            'StudentID' => ['required', 'digits:9']
        ]);

        $user = Auth::guard('adviser')->user();

        $student = VerifiedStudent::where('SID', request('StudentID'))->first();


        // Check if student with given Student ID exists in VerifiedStudent table
        if(isset($student) && ! empty($student)){
            // Store Student ID in SID_REQUEST
            $user->SID_REQUEST = request('StudentID');
            $user->save();

            return redirect('/adviser/viewStudent');
        }
        else{
            return redirect('/adviser/home')->with('message', 'Either a student with that Student ID does not exist, or that student has not yet created a verified account.');
        }
    }

    /*****************
     * 
     * Function:    createViewStudent
     * 
     * Description: Show student info
     * 
     *****************/
    public function createViewStudent(){
        $adviser = Auth::guard('adviser')->user();
        $student_id = $adviser->SID_REQUEST;
        $viewTerm = $adviser->VIEW_TERM;
        $viewYear = $adviser->VIEW_YEAR;

        $selectedCourses = SelectedCourse::where('STUDENT_ID', $student_id)->where('TERM', $viewTerm)
                            ->where('YEAR', $viewYear)->orderBy('COURSE_ABBR')->get();
        $completedCourses = CompletedCourses::where('STUDENT_ID', $student_id)
                            ->orderBy('YEAR', 'asc')->orderBy('TERM_ID', 'asc')->get();
        $terms = Terms::all();

        // Get remaining courses using diff()
        $allCourses = Course::select('COURSE_ABBR', 'COURSE_NAME')->pluck('COURSE_ABBR', 'COURSE_NAME');
        $completed = CompletedCourses::select('COURSE_ABBR', 'COURSE_NAME')->where('STUDENT_ID', $student_id)
                    ->orderBy('COURSE_ABBR', 'asc')->pluck('COURSE_ABBR', 'COURSE_NAME');
        $remainingCourses = $allCourses->diff($completed);   

        return view('adviser.viewStudent')->with('selected', $selectedCourses)
                ->with('completed', $completedCourses)->with('terms', $terms)
                ->with('remainingCourses', $remainingCourses)->with('adviser', $adviser);
    }

    /*****************
     * 
     * Function:    storeViewStudent
     * 
     * Description: Perform adviser actions and/or store changes to student's preferred (selected) courses
     * 
     *****************/
    public function storeViewStudent(Request $request){
        $adviser = Auth::guard('adviser')->user();

        if($request->input('SubmitTerm') != null){
            request()->validate([
                'Term' => ['required'],
                'Year' => ['required']
            ]);

            // Update term and year that adviser wants to view
            $adviser->VIEW_TERM = request('Term');
            $adviser->VIEW_YEAR = request('Year');
            $adviser->save();

            return redirect('/adviser/viewStudent');
        }
        else if($request->input('Approve') != null){
            $approve = $request->input('approve');      // array of approved courses
            $completed = $request->input('completed');  // array of courses to be marked complete

            if($approve != null){
                for($i = 0; $i < count($approve); $i++){
                    $course = SelectedCourse::where('STUDENT_ID', $adviser->SID_REQUEST)
                                            ->where('COURSE_ABBR', $approve[$i])->first();
                    $course->APPROVED_AT = Carbon::now();
                    $course->save();
                }
            }
            if($completed != null){
                // Delete records from 'selected_course', and create record in 'completed_courses'
                for($i = 0; $i < count($completed); $i++){
                    $course = SelectedCourse::where('STUDENT_ID', $adviser->SID_REQUEST)
                                            ->where('COURSE_ABBR', $completed[$i])->first();

                    // Copy to CompletedCourse
                    $cc = CompletedCourses::create([
                        'STUDENT_ID' => $course->STUDENT_ID,
                        'COURSE_ABBR' => $course->COURSE_ABBR,
                        'COURSE_NAME' => $course->COURSE_NAME,
                        'TERM' => $course->TERM,
                        'TERM_ID' => $course->TERM_ID,
                        'YEAR' => $course->YEAR,
                        'MARKED_COMPLETE' => Carbon::now()
                    ]);

                    // Delete from SelectedCourse
                    $course->delete();
                }
            }

            return redirect('/adviser/viewStudent');
        }
        else if($request->input('Modify')){
            $adviser->VIEW_MODE = 1;
            $adviser->save();

            return redirect('/adviser/viewStudent');
        }
        else if($request->input('GoBack') != null){
            $adviser->VIEW_MODE = 0;
            $adviser->save();

            return redirect('/adviser/viewStudent');
        }
        else if($request->input('Complete')){
            $studentCourses = SelectedCourse::where('STUDENT_ID', $adviser->SID_REQUEST)
                                            ->where('TERM', $adviser->VIEW_TERM)
                                            ->where('YEAR', $adviser->VIEW_YEAR)
                                            ->orderBy('APPROVED_AT', 'asc')->get();
            


            // If student is not taking any courses for the upcoming semester
            if(empty($studentCourses) || $studentCourses[0]->APPROVED_AT != null){
                $student = VerifiedStudent::where('SID', $adviser->SID_REQUEST)->first();
                $student->REMOVE_HOLD_FOR = $adviser->VIEW_TERM . " " . $adviser->VIEW_YEAR;
                $student->LAST_MEETING = Carbon::now();
                $student->save();

                return redirect('/adviser/home');
            }
            else{
                return redirect('/adviser/viewStudent')->withErrors('ALL courses must be reviewed and approved by adviser');
            }
                        
        }
        else if($request->input('SubmitChanges')){
            $adviser->VIEW_MODE = 0;
            $adviser->save();

            switch($adviser->VIEW_TERM){
                case 'WINTER':
                    $term_id = 1;
                    break;
                case 'SPRING':
                    $term_id = 2;
                    break;
                case 'SUMMER':
                    $term_id = 3;
                    break;
                case 'FALL':
                    $term_id = 4;
                    break;
                default:
            }

            // Delete previous records for the selected term and year
            SelectedCourse::where('STUDENT_ID', $adviser->SID_REQUEST)->where('TERM', $adviser->VIEW_TERM)->where('YEAR', $adviser->VIEW_YEAR)->delete();

            if(request('Course1') != null){
                $sc = SelectedCourse::updateOrCreate([
                    'STUDENT_ID' => $adviser->SID_REQUEST,
                    'COURSE_ABBR' => request('Course1'),
                    'COURSE_NAME' => Course::where('COURSE_ABBR', request('Course1'))->first()->COURSE_NAME,
                ]);
                $sc->TERM = $adviser->VIEW_TERM;
                $sc->TERM_ID = $term_id;
                $sc->YEAR = $adviser->VIEW_YEAR;
                $sc->ADDED_AT = Carbon::now();
                $sc->save();
            }
            if(request('Course2') != null){
                $sc = SelectedCourse::updateOrCreate([
                    'STUDENT_ID' => $adviser->SID_REQUEST,
                    'COURSE_ABBR' => request('Course2'),
                    'COURSE_NAME' => Course::where('COURSE_ABBR', request('Course2'))->first()->COURSE_NAME,
                ]);
                $sc->TERM = $adviser->VIEW_TERM;
                $sc->TERM_ID = $term_id;
                $sc->YEAR = $adviser->VIEW_YEAR;
                $sc->ADDED_AT = Carbon::now();
                $sc->save();
            }
            if(request('Course3') != null){
                $sc = SelectedCourse::updateOrCreate([
                    'STUDENT_ID' => $adviser->SID_REQUEST,
                    'COURSE_ABBR' => request('Course3'),
                    'COURSE_NAME' => Course::where('COURSE_ABBR', request('Course3'))->first()->COURSE_NAME,
                ]);
                $sc->TERM = $adviser->VIEW_TERM;
                $sc->TERM_ID = $term_id;
                $sc->YEAR = $adviser->VIEW_YEAR;
                $sc->ADDED_AT = Carbon::now();
                $sc->save();
            }
            if(request('Course4') != null){
                $sc = SelectedCourse::updateOrCreate([
                    'STUDENT_ID' => $adviser->SID_REQUEST,
                    'COURSE_ABBR' => request('Course4'),
                    'COURSE_NAME' => Course::where('COURSE_ABBR', request('Course4'))->first()->COURSE_NAME,
                ]);
                $sc->TERM = $adviser->VIEW_TERM;
                $sc->TERM_ID = $term_id;
                $sc->YEAR = $adviser->VIEW_YEAR;
                $sc->ADDED_AT = Carbon::now();
                $sc->save();
            }
            if(request('Course5') != null){
                $sc = SelectedCourse::updateOrCreate([
                    'STUDENT_ID' => $adviser->SID_REQUEST,
                    'COURSE_ABBR' => request('Course5'),
                    'COURSE_NAME' => Course::where('COURSE_ABBR', request('Course5 '))->first()->COURSE_NAME,
                ]);
                $sc->TERM = $adviser->VIEW_TERM;
                $sc->TERM_ID = $term_id;
                $sc->YEAR = $adviser->VIEW_YEAR;
                $sc->ADDED_AT = Carbon::now();
                $sc->save();
            }

            return redirect('/adviser/viewStudent');
        }
    }
}
<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\VerifiedAdviser;
use App\UnverifiedAdviser;
use App\VerifiedStudent;
use App\A_Session;
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
        $user = Auth::guard('adviser')->user();

        return view('adviser.viewStudent')->with('user', $user);
    }
}
<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\UnverifiedAdviser;
use App\VerifiedAdviser;
use App\UnverifiedStudent;
use App\VerifiedStudent;
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
        return view('student.welcome');
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
                // Need to create a record in session...
                
                // Send to student home page
                return redirect('/student/home');
            }
            else{
                // Email and password don't match
                return redirect('/student')->withErrors('Email and password do not match');
            }
        }
        // User was not found in VerifiedAdviser table, so now search VerifiedStudents
        else{
            $user = VerifiedStudent::where('EMAIL', request('Email'))->first();

            //dd($user->FIRST_NAME);

            if(isset($user) && ! empty($user)){
                // Email exists in the VerifiedStudents table, now check if password matches
                if($user->TEMP_PW == request('Password')){
                    // Need to create a record in session...
                    
                    // Send to student home page
                    return redirect('/student/home');
                }
                else{
                    // Email and password don't match
                    return redirect('/');   // Add warning message that says that email and password don't match
                }
            }
            
            return view('student.welcome'); /* NEED TO REDIRECT TO ADVISER.HOME OR STUDENT.HOME DEPENDING ON ACCOUNT TYPE */
        }
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
            'Email' => ['required', 'email'],
            'Password' => ['required']
        ]);

        // Check if an account already exists with the provided email
        $unverified_exists = new UnverifiedStudent;
        $unverified_exists = UnverifiedStudent::where('EMAIL', request('Email'))->first();

        $verified_exists = new VerifiedStudent;
        $verified_exists = VerifiedStudent::where('EMAIL', request('Email'))->first();

        //dd($unverified_exists);
        //dd($verified_exists);

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

            $newEntry = UnverifiedStudent::create([
                'TITLE' => request('Title'),
                'FIRST_NAME' => request('FirstName'),
                'MI' => request('MI'),
                'LAST_NAME' => request('LastName'),
                'SUFFIX' => request('Suffix'),
                'EMAIL' => request('Email'),
                'HASH_PW' => Hash::make($unverified_pw),
                'CREATED' => Carbon::now(),
                'UPDATED' => Carbon::now(),
                'VERIFICATION_TOKEN' => $verificationToken
            ]);
        }

        // Send verification email
        Mail::to(request('Email'))->send(new ConfirmationMail($newEntry));

        return redirect('/student/confirmation');   //need to implement sessions to flash email to confirmation page
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
            return redirect('/')->with('warning', 'Sorry your email address cannot be identified. Please contact onlineadvising@csudh.edu');
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
        return view('student.home');
    }
}
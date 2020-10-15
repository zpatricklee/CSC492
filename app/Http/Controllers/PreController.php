<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\UnverifiedAdviser;
use App\VerifiedAdviser;
use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use URL;

class PreController extends Controller
{
    /*****************
     * 
     * Function:    index
     * 
     * Description: Display welcome/login page (index)
     * 
     *****************/
    public function index(){
        return view('welcome');
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

        // Check if user is an adviser or a student, then redirect accordingly
        $user = VerifiedAdviser::where('EMAIL', request('Email'))->first();

        if(isset($user) && ! empty($user)){
            // Email exists in the VerifiedAdviser table, now check if password matches
            if($user->TEMP_PW == request('Password')){
                // Need to create a record in session...
                
                // Send to adviser home page
                return redirect('/adviser/home');
            }
            else{
                // Email and password don't match
                return redirect('/');   // Add warning message that says that email and password don't match
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
            
            return view('welcome'); /* NEED TO REDIRECT TO ADVISER.HOME OR STUDENT.HOME DEPENDING ON ACCOUNT TYPE */
        }
    }

    /*****************
     * 
     * Function:    createRegister
     * 
     * Description: Show the registration page where new users enter their basic information
     * 
     *****************/
    public function createRegister(){
        return view('register');
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
            'Email' => 'required|email'
        ]);

        $email = request('Email');

        Mail::raw('It works!', function($message){
            $message->to(request('Email'))
            ->subject('Hello There');
        });

        // Send verification email
        //Mail::to(request('Email'))->send(new ConfirmationMail());

        return redirect('/confirmation')
            ->with($email);
    }

    /*****************
     * 
     * Function:    createConfirmation
     * 
     * Description: Show the confirmation page that notifies the user that a verification link has been sent to their email
     * 
     *****************/
    public function createConfirmation(){
        return view('confirmation');
    }
}

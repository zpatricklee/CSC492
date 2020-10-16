<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\UnverifiedAdviser;
use App\VerifiedAdviser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
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
        //$user = VerifiedStudent::where('EMAIL', request('Email'))->first();


        dd($user->FIRST_NAME);
        
        return view('student.home'); /* NEED TO REDIRECT TO ADVISER.HOME OR STUDENT.HOME DEPENDING ON ACCOUNT TYPE */
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
     * Function:    createConfirmation
     * 
     * Description: Show the confirmation page that notifies the user that a verification link has been sent to their email
     * 
     *****************/
    public function createConfirmation(){
        return view('confirmation');
    }

    public function testStudentHome(){
        return view('student.home');
    }
}

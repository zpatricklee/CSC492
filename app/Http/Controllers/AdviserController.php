<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\VerifiedAdviser;
use App\UnverifiedAdviser;
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
        return view('adviser.welcome');
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
        $unverifiedExists = UnverifiedAdviser::where('EMAIL', request('Email'))->first();
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
                'FIRST_NAME' =>request('FirstName'),
                'MI' => request('MI'),
                'LAST_NAME' => request('LastName'),
                'SUFFIX' => request('Suffix'),
                'EMAIL' => request('Email'),
                'DEPARTMENT' => request('Department'),
                'OFFICE' => request('Office'),
                'CREATED' => Carbon::now(),
                'UPDATED' => Carbon::now()
            ]);

            // Send confirmation email
            Mail::to(request('Email'))->send(new AdviserConfirmationMail($newEntry));

            return redirect('/adviser/confirmation');
        }
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
     * Function:    createHome
     * 
     * Description: Display home page
     * 
     *****************/
    public function createHome(){
        return view('adviser.home');
    }
}
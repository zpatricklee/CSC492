<?php

namespace App\Http\Controllers;

use App\Course;
use App\Unverified_adviser;
use App\Verified_adviser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        
        return view('register');
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
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Course;
use App\VerifiedAdviser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
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
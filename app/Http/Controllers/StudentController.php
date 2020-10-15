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

class StudentController extends Controller
{
    /*****************
     * 
     * Function:    home
     * 
     * Description: Display home page
     * 
     *****************/
    public function createHome(){
        return view('student.home');
    }
}
@extends('master')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Student Home Page</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->	
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .MainContent {
                font-size: 25px;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                width: 74%;
                float: left;
                text-align: center;
                height: 40%;

                border: 1px solid red;
            }

            .AdvisorNotes {
                font-size: 25px;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                width: 25%;
                float: right;
                text-align: center;
                height: 40%;

                border: 1px solid blue;
            }

            .Courses {
                font-size: 25px;
                text-align: center;
                width: 100%;

                border: 1px solid green;
            }

            .CompletedCourse {
                font-size: 25px;
                text-align: center;
                width: 100%;

                border: 1px solid pink;
            }

            option{
                padding-left: 20px;
            }
            
        </style>
    </head>
    <body>
        <div class="TopBar">
                Welcome, {{ $user->first_name }}
            <div class="logout">
                <A HREF="./logout"  STYLE="color: #800000">LOG OUT</A>
            </div>
        </div>

        <!-- Error-handling -->
        @if (session('warning'))
            <div class="alert alert-warning">
                {!! session('warning') !!}
            </div>
        @endif
        @if ($errors->any())
            <div class="error-notification">
                Please fix the following errors to continue:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="MainContent">
        <h4> <center>Preferred Courses</center></h4>
        <form action="" method="post">

        <!-- Laravel's security out of the box -->
        {{ csrf_field() }}

        Term: 
        <select name="Term">
            <option></option>
            @foreach ($terms as $term)
                <option value="{{ $term->TERM }}">{{ $term->TERM }}</option>
            @endforeach
        </select>
        <select name="Year">
            <option></option>
            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
            <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
        </select>
        
        <br>
        Course: 
        <select name="Course1">
            <option></option>
            @foreach ($remainingCourses as $key=>$value)
                <option value="{{ $key }}" {{ old('Course1') == $key ? 'selected' : '' }}>{{ $key }} {{ $value }}</option>
            @endforeach
        </select>
        <br>
        Course:
        <select name="Course2">
            <option></option>
            @foreach ($remainingCourses as $key=>$value)
                <option value="{{ $key }}" {{ old('Course2') == $key ? 'selected' : '' }}>{{ $key }} {{ $value }}</option>
            @endforeach
        </select>
        <br>
        Course:
        <select name="Course3">
            <option></option>
            @foreach ($remainingCourses as $key=>$value)
                <option value="{{ $key }}" {{ old('Course3') == $key ? 'selected' : '' }}>{{ $key }} {{ $value }}</option>
            @endforeach
        </select>
        <br>
        Course:
        <select name="Course4">
            <option></option>
            @foreach ($remainingCourses as $key=>$value)
                <option value="{{ $key }}" {{ old('Course4') == $key ? 'selected' : '' }}>{{ $key }} {{ $value }}</option>
            @endforeach
        </select>
        <br>
        Course:
        <select name="Course5">
            <option></option>
            @foreach ($remainingCourses as $key=>$value)
                <option value="{{ $key }}" {{ old('Course5') == $key ? 'selected' : '' }}>{{ $key }} {{ $value }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" name="Submit" value="Submit Courses for Approval">
        </form>
        </div>

        <div class="AdvisorNotes">
            <h4>Advisor Notes</h4>
                
        </div>

        <div class="Selected Courses">
            <h4>Courses Pending Approval</h4>
            @if ($selectedCourses != NULL)
                @foreach ($selectedCourses as $s)
                    <li>{{ $s->COURSE_ABBR }} {{ $s->COURSE_NAME }} ({{ $s->TERM }})</li>
                @endforeach
            @endif
        </div>

        <div class="CompletedCourse">
            <h4>Completed Courses</h4>
            @foreach ($completedCourses as $key=>$value)
                <li>{{ $key }} {{ $value }}</li>
            @endforeach
        </div>
    </body>
</html>

@endsection
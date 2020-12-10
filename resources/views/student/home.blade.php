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
            .flex-container{
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                flex-wrap: wrap;
                font-size: 130%;
                text-align: center;
            }
            .CompletedCourse {
                font-size: 25px;
                text-align: center;
                width: 100%;
                font-size: 130%;
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

        <div class="flex-container">
            <div style="flex-grow: 1; text-align: center">
            <form action="" method="post">

            <!-- Laravel's security out of the box -->
            {{ csrf_field() }}

                <h4 align="center">Courses Pending Approval</h4>
                @if ($selectedCourses != NULL)
                    <table align="center" border="true" style="border: 1px solid black; border-collapse: collapse">
                    <th style="padding: 5px">SELECT</th>
                    <th style="padding: 5px">COURSE</th>
                    <th style="padding: 5px">TERM</th>
                    @foreach ($selectedCourses as $s)
                        <tr>
                            <td align="center"><input type="checkbox" name="removeSelected[]" value="{{ $s->COURSE_ABBR }}"></td><td style="padding: 5px">{{ $s->COURSE_ABBR }} {{ $s->COURSE_NAME }}</td><td style="padding: 5px">{{ $s->TERM }} {{ $s->YEAR }}</td></input>
                        </tr>
                    @endforeach
                    </table>
                @endif
                <br><input type="submit" name="Remove Selected Courses" value="Remove Selected Courses">
            </form>
            </div>

            <div style="flex-grow: 1; text-align: center">
                <h4> <center>Preferred Courses</center></h4>
                <form action="" method="post">

                <!-- Laravel's security out of the box -->
                {{ csrf_field() }}

                Term: 
                <select name="Term">
                    <option></option>
                    @foreach ($terms as $term)
                        <option value="{{ $term->TERM_NAME }}">{{ $term->TERM_NAME }}</option>
                    @endforeach
                </select>
                <select name="Year">
                    <option></option>
                    <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                    <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                </select>
                
                <br><br>
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
            
            <div style="flex-grow: 2">
                <h4>Advisor Notes</h4>
                {{ isset($note->NOTE) ? $note->NOTE : '' }}
            </div> 
            <div style="flex-grow: 2">
            </div>       
        </div>

        <div class="CompletedCourse">
            <h4>Completed Courses</h4>
            @if ($completedCourses != NULL)
                <table align="center" border="true" style="border: 1px solid black; border-collapse: collapse">
                <th style="padding: 5px">COURSE</th>
                <th style="padding: 5px">TERM</th>
                @foreach ($completedCourses as $cc)
                    <tr>
                        <td>{{ $cc->COURSE_ABBR }} {{ $cc->COURSE_NAME }}</td><td>{{ $cc->TERM }} {{ $cc->YEAR }}</td>
                    </tr>
                @endforeach
                </table>
            @endif
        </div>
    </body>
</html>

@endsection
@extends('adviser_master')

@section('content')

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        margin: 0;
    }
    .logout {
        font-size: 25px;
        text-align: right;
        width: 100%;
        //background-color: #24d0ff;
    }
    .student_info {
        font-size: 20px;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        width: 75%;
        float: left;
        text-align: left;
        position: relative;
        left: 30px;
        height: 100%;
        //background-color: #d11515;
    }
    .adviserNotes {
        font-size: 25px;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        width: 25%;
        float: right;
        text-align: left;
        height: 55%;
        background-color: #fff824;
    }
    .selectedCourses {
        font-size: 25px;
        text-align: center;
        float: left;
        width: 75%;
        height: 55%;
        background-color: #4cff24;
    }
    .completedCourses {
        font-size: 25px;
        text-align: center;
        width: 100%;
        //background-color: #24d0ff;
    }
    table, th, tr, td {
        border: 1px solid black; 
        border-collapse: collapse;
        padding: 5px;
    }
</style>

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

<div class="logout">
    <a href="./logout"  style="color: #800000">LOG OUT</a>
</div>

<div class="selectedCourses">
    <form action="" method="POST">

    <!-- Laravel's security out of the box -->
    {{ csrf_field() }}

        <h4>Selected Courses / Courses Pending Approval</h4>
        View classes for selected term: 
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
        <input type="submit" name="SubmitTerm" value="Submit">

        <br><br>
        @if ($viewTerm != null && $viewYear != null)
            <table class="adviserTable" align="center">
                <th>COURSE</th>
                <th>TERM</th>
                <th>APPROVE</th>
                <th>COMPLETED</th>
                <th>ADVISER NOTES</th>
                <!-- Course 1 -->
                    <tr>
                        <td>
                            <select name="Course1">
                                <option value="" selected></option>
                                    
                                    @foreach ($remainingCourses as $key=>$value)
                                        <option value="{{ $value }}" {{ (isset($selected[0]) && $selected[0]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                            {{ $value }} {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>{{ $viewTerm }} {{ $viewYear }}</td>
                        <td align="center"><input type="checkbox" name="approve[]" value=""></td>
                        <td align="center"><input type="checkbox" name="completed[]" value=""></td>
                        <td><textarea name="adviserNote1"></textarea></td>
                    </tr>

                <!-- Course 2 -->
                    <tr>
                        <td>
                            <select name="Course2">
                                <option value="" selected></option>
                                    
                                    @foreach ($remainingCourses as $key=>$value)
                                        <option value="{{ $value }}" {{ (isset($selected[1]) && $selected[1]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                            {{ $value }} {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>{{ $viewTerm }} {{ $viewYear }}</td>
                        <td align="center"><input type="checkbox" name="approve[]" value=""></td>
                        <td align="center"><input type="checkbox" name="completed[]" value=""></td>
                        <td><textarea name="adviserNote2"></textarea></td>
                    </tr>

                <!-- Course 3 -->
                    <tr>
                        <td>
                            <select name="Course3">
                                <option value="" selected></option>
                                    
                                    @foreach ($remainingCourses as $key=>$value)
                                        <option value="{{ $value }}" {{ (isset($selected[2]) && $selected[2]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                            {{ $value }} {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>{{ $viewTerm }} {{ $viewYear }}</td>
                        <td align="center"><input type="checkbox" name="approve[]" value=""></td>
                        <td align="center"><input type="checkbox" name="completed[]" value=""></td>
                        <td><textarea name="adviserNote3"></textarea></td>
                    </tr>

                <!-- Course 4 -->
                    <tr>
                        <td>
                            <select name="Course4">
                                <option value="" selected></option>
                                    
                                    @foreach ($remainingCourses as $key=>$value)
                                        <option value="{{ $value }}" {{ (isset($selected[3]) && $selected[3]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                            {{ $value }} {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>{{ $viewTerm }} {{ $viewYear }}</td>
                        <td align="center"><input type="checkbox" name="approve[]" value=""></td>
                        <td align="center"><input type="checkbox" name="completed[]" value=""></td>
                        <td><textarea name="adviserNote4"></textarea></td>
                    </tr>

                <!-- Course 5 -->
                    <tr>
                        <td>
                            <select name="Course5">
                                <option value="" selected></option>
                                    
                                    @foreach ($remainingCourses as $key=>$value)
                                        <option value="{{ $value }}" {{ (isset($selected[4]) && $selected[4]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                            {{ $value }} {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>{{ $viewTerm }} {{ $viewYear }}</td>
                        <td align="center"><input type="checkbox" name="approve[]" value=""></td>
                        <td align="center"><input type="checkbox" name="completed[]" value=""></td>
                        <td><textarea name="adviserNote5"></textarea></td>
                    </tr>
            </table>
        @endif
        <br>
        <input type="submit" name="Approve" value="Approve Selected Courses"></input>
    </form>    
</div>
<div class="adviserNotes">
    test
</div>
    
    <h4>Completed Courses</h4>
        @foreach ($completed as $c)
            <li>{{ $c->COURSE_ABBR }} {{ $c->COURSE_NAME }}</li>
        @endforeach


@endsection
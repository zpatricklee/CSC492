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
    .navbar {
        width: 100%;
        font-size: 20px;
        color: #800000;
        text-align: right;
        //background-color: #24d0ff;
    }
    .logout {
        text-align: right;
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
        height: 60%;
        //background-color: #fff824;
    }
    .selectedCourses {
        font-size: 25px;
        text-align: center;
        float: left;
        width: 100%;
        height: 60%;
        //background-color: #4cff24;
    }
    .completed-courses {
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

<div class="navbar">
    <a href="./home" class="navbar">[HOME] </a>
    <a href="./logout" class="navbar">[LOG OUT]</a>
    <br><br>
</div>

<div class="selectedCourses">
    <form action="" method="POST">

    <!-- Laravel's security out of the box -->
    {{ csrf_field() }}

        <h4>Selected Courses / Courses Pending Approval</h4>
        @if ($adviser->VIEW_MODE == 0)
        View classes for selected term: 
        <select name="Term">
            <option value="" selected></option>
            @foreach ($terms as $term)
                <option value="{{ $term->TERM_NAME }}" {{ ($adviser->VIEW_TERM == $term->TERM_NAME) ? 'selected' : '' }}>{{ $term->TERM_NAME }}</option>
            @endforeach
        </select>
        <select name="Year">
            <option value="" selected></option>
            <option value="{{ date('Y') }}" {{ ($adviser->VIEW_YEAR == date('Y')) ? 'selected' : ''}}>{{ date('Y') }}</option>
            <option value="{{ date('Y')+1 }}" {{ ($adviser->VIEW_YEAR == date('Y')+1) ? 'selected' : ''}}>{{ date('Y')+1 }}</option>
        </select>
        <input type="submit" name="SubmitTerm" value="Submit">
        <br><br>
        @endif
        
        @if ($adviser->VIEW_TERM != null && $adviser->VIEW_YEAR != null)
            <table class="adviserTable" align="center">
                @if ($adviser->VIEW_MODE == 0)
                <th>STATUS</th>
                @endif
                <th>COURSE</th>
                <th>TERM</th>
                @if ($adviser->VIEW_MODE == 0)
                <th>APPROVE</th>
                <th>COMPLETED</th>
                @endif
                <th>ADVISER NOTES</th>
                <!-- Course 1 -->
                    <tr>
                        @if($adviser->VIEW_MODE == 0)
                        <td>
                            @if(isset($selected[0]))
                                @if(isset($selected[0]->APPROVED_AT))
                                    Approved
                                @else
                                    Pending Approval
                                @endif
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($adviser->VIEW_MODE == 1)
                                <select name="Course1">
                                    <option value="" selected></option>
                                        @foreach ($remainingCourses as $key=>$value)
                                            <option value="{{ $value }}" {{ (isset($selected[0]) && $selected[0]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                                {{ $value }} {{ $key }}
                                            </option>
                                        @endforeach
                                </select>
                            @else
                                {{ isset($selected[0]) ? $selected[0]->COURSE_ABBR : '' }} {{ isset($selected[0]) ? $selected[0]->COURSE_NAME : '' }}
                            @endif
                        </td>
                        <td>{{ $adviser->VIEW_TERM }} {{ $adviser->VIEW_YEAR }}</td>
                        @if ($adviser->VIEW_MODE == 0)
                            @if (isset($selected[0]))
                                @if (!isset($selected[0]->APPROVED_AT))
                                <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[0]) ? $selected[0]->COURSE_ABBR : ''}}></td>
                                @else
                                <td></td>
                                @endif
                                <td align="center"><input type="checkbox" name="completed[]" value={{ isset($selected[0]) ? $selected[0]->COURSE_ABBR : ''}}></td>
                            @else
                            <td></td><td></td>
                            @endif
                        @endif
                        <td rowspan="5"><textarea name="AdviserNote" rows="9" cols="30">{{ isset($note->NOTE) ? $note->NOTE : ''}}</textarea></td>
                    </tr>

                <!-- Course 2 -->
                    <tr>
                        @if($adviser->VIEW_MODE == 0)
                        <td>
                            @if(isset($selected[1]))
                                @if(isset($selected[1]->APPROVED_AT))
                                    Approved
                                @else
                                    Pending Approval
                                @endif
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($adviser->VIEW_MODE == 1)
                                <select name="Course2">
                                    <option value="" selected></option>
                                        @foreach ($remainingCourses as $key=>$value)
                                            <option value="{{ $value }}" {{ (isset($selected[1]) && $selected[1]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                                {{ $value }} {{ $key }}
                                            </option>
                                        @endforeach
                                </select>
                            @else
                                {{ isset($selected[1]) ? $selected[1]->COURSE_ABBR : '' }} {{ isset($selected[1]) ? $selected[1]->COURSE_NAME : '' }}
                            @endif
                        </td>
                        <td>{{ $adviser->VIEW_TERM }} {{ $adviser->VIEW_YEAR }}</td>
                        @if ($adviser->VIEW_MODE == 0)
                            @if (isset($selected[1]))
                                @if (!isset($selected[1]->APPROVED_AT))
                                <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[1]) ? $selected[1]->COURSE_ABBR : ''}}></td>
                                @else
                                <td></td>
                                @endif
                                <td align="center"><input type="checkbox" name="completed[]" value={{ isset($selected[1]) ? $selected[1]->COURSE_ABBR : ''}}></td>
                            @else
                            <td></td><td></td>
                            @endif
                        @endif
                    </tr>

                <!-- Course 3 -->
                    <tr>
                        @if($adviser->VIEW_MODE == 0)
                        <td>
                            @if(isset($selected[2]))
                                @if(isset($selected[2]->APPROVED_AT))
                                    Approved
                                @else
                                    Pending Approval
                                @endif
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($adviser->VIEW_MODE == 1)
                                <select name="Course3">
                                    <option value="" selected></option>
                                        @foreach ($remainingCourses as $key=>$value)
                                            <option value="{{ $value }}" {{ (isset($selected[2]) && $selected[2]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                                {{ $value }} {{ $key }}
                                            </option>
                                        @endforeach
                                </select>
                            @else
                                {{ isset($selected[2]) ? $selected[2]->COURSE_ABBR : '' }} {{ isset($selected[2]) ? $selected[2]->COURSE_NAME : '' }}
                            @endif
                        </td>
                        <td>{{ $adviser->VIEW_TERM }} {{ $adviser->VIEW_YEAR }}</td>
                        @if ($adviser->VIEW_MODE == 0)
                            @if (isset($selected[2]))
                                @if (!isset($selected[2]->APPROVED_AT))
                                <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[2]) ? $selected[2]->COURSE_ABBR : ''}}></td>
                                @else
                                <td></td>
                                @endif
                                <td align="center"><input type="checkbox" name="completed[]" value={{ isset($selected[2]) ? $selected[2]->COURSE_ABBR : ''}}></td>
                            @else
                            <td></td><td></td>
                            @endif
                        @endif
                    </tr>

                <!-- Course 4 -->
                    <tr>
                        @if($adviser->VIEW_MODE == 0)
                        <td>
                            @if(isset($selected[3]))
                                @if(isset($selected[3]->APPROVED_AT))
                                    Approved
                                @else
                                    Pending Approval
                                @endif
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($adviser->VIEW_MODE == 1)
                                <select name="Course4">
                                    <option value="" selected></option>
                                        @foreach ($remainingCourses as $key=>$value)
                                            <option value="{{ $value }}" {{ (isset($selected[3]) && $selected[3]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                                {{ $value }} {{ $key }}
                                            </option>
                                        @endforeach
                                </select>
                            @else
                                {{ isset($selected[3]) ? $selected[3]->COURSE_ABBR : '' }} {{ isset($selected[3]) ? $selected[3]->COURSE_NAME : '' }}
                            @endif
                        </td>
                        <td>{{ $adviser->VIEW_TERM }} {{ $adviser->VIEW_YEAR }}</td>
                        @if ($adviser->VIEW_MODE == 0)
                            @if (isset($selected[3]))
                                @if (!isset($selected[3]->APPROVED_AT))
                                <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[3]) ? $selected[3]->COURSE_ABBR : ''}}></td>
                                @else
                                <td></td>
                                @endif
                            <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[3]) ? $selected[3]->COURSE_ABBR : ''}}></td>
                            @else
                            <td></td><td></td>
                            @endif
                        @endif
                    </tr>

                <!-- Course 5 -->
                    <tr>
                        @if($adviser->VIEW_MODE == 0)
                        <td>
                            @if(isset($selected[4]))
                                @if(isset($selected[4]->APPROVED_AT))
                                    Approved
                                @else
                                    Pending Approval
                                @endif
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($adviser->VIEW_MODE == 1)
                                <select name="Course5">
                                    <option value="" selected></option>
                                        @foreach ($remainingCourses as $key=>$value)
                                            <option value="{{ $value }}" {{ (isset($selected[4]) && $selected[4]->COURSE_ABBR == $value) ? 'selected' : '' }}>
                                                {{ $value }} {{ $key }}
                                            </option>
                                        @endforeach
                                </select>
                            @else
                                {{ isset($selected[4]) ? $selected[4]->COURSE_ABBR : '' }} {{ isset($selected[4]) ? $selected[4]->COURSE_NAME : '' }}
                            @endif
                        </td>
                        <td>{{ $adviser->VIEW_TERM }} {{ $adviser->VIEW_YEAR }}</td>
                        @if ($adviser->VIEW_MODE == 0)
                            @if (isset($selected[4]))
                                @if (!isset($selected[4]->APPROVED_AT))
                                <td align="center"><input type="checkbox" name="approve[]" value={{ isset($selected[4]) ? $selected[4]->COURSE_ABBR : ''}}></td>
                                @else
                                <td></td>
                                @endif
                            <td align="center"><input type="checkbox" name="completed[]" value={{ isset($selected[4]) ? $selected[4]->COURSE_ABBR : ''}}></td>
                            @else
                            <td></td><td></td>
                            @endif
                        @endif
                    </tr>
            </table>
        
        <br>
            @if ($adviser->VIEW_MODE == 0)
                <input type="submit" name="Modify" value="Modify Selected Courses"/> <input type="submit" name="Approve" value="Approve Selected Courses"/>
                <br><br>
                <input type="submit" name="Complete" value="Complete Adviser Meeting for Selected Term"/>
            @else
                <input type="submit" name="GoBack" value="Go Back"></input> <input type="submit" name="SubmitChanges" value="Submit Changes"/>
            @endif
        @else
            <h4>Adviser Notes</h4>
            <textarea name="AdviserNote" rows="9" cols="30">{{ isset($note->NOTE) ? $note->NOTE : ''}}</textarea>
        @endif 
    </form>    
</div>
<div class="completed-courses">
    <h4>Completed Courses</h4>
        <table align="center">
            <th>COURSE</th>
            <th>TERM</th>
            @foreach ($completed as $c)
                <tr>
                    <td>{{ $c->COURSE_ABBR }} {{ $c->COURSE_NAME }}</td><td>{{ $c->TERM }} {{ $c->YEAR }}</td>
                </tr>
            @endforeach
        </table>
</div>

@endsection
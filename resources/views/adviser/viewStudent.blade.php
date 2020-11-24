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

    .Student_info {
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

    .AdvisorNotes {
    font-size: 25px;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    width: 25%;
    float: right;
    text-align: left;
    height: 100%;
    //background-color: #fff824;
    }

    .Courses {
    font-size: 25px;
    text-align: center;
    width: 100%;
    //background-color: #4cff24;
    }

    .CompletedCourse {
    font-size: 25px;
    text-align: center;
    width: 100%;
    //background-color: #24d0ff;
    }

</style>

<div class="logout">
        <A HREF="./logout">LOG OUT</A>
</div>

<div class = "Student_info">
    <br>Student ID: {{ $user->SID_REQUEST }}</br>
    <br>NAME:</br>
    <br>EMAIL:</br>
    <br>ADVISOR:</br>
    
    <div class="Courses">
        <h4>Student's Preffered Course TESTING</h4>
        <?php
            $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db'); 
            $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course"); //Here we select the table we want to pull from
        ?>
        <ul style ="list-style-type:none; margin:0; padding:0">
            <?php
                while($rows = $fetchCourse->fetch_assoc()){
                    $COURSE_NAME = $rows['COURSE_NAME'];
                echo "<li value = '$COURSE_NAME' >$COURSE_NAME</li>";
                }
            ?>
    </div>
</div>

<div class="AdvisorNotes">
    <h4>AdvisorNotes</h4>
    <form action="" method = "post">
    {{ csrf_field()}}

    Course:
    <select name = "crs_abbr" Float = "left">
        <option></option>
    </select>
    <br></br>
    <textarea rows="5" cols="60" name="aNote"></textarea>
    <br></br>
    <input type="submit" value="Submit">
    </form>
</div>


@endsection
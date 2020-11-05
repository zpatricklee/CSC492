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

            .Topbar {
                font-size: 84px;
                margin: 10;
                width: 100%;
            }
            
            .MainContent {
                font-size: 25px;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                width: 75%;
                float: left;
                text-align: center;
                height: 50%;
            }

            .AdvisorNotes {
                font-size: 25px;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                width: 25%;
                float: right;
                text-align: center;
                height: 50%;
            }

            .Courses {
                font-size: 25px;
                text-align: center;
                width: 100%;
            }

            .CompletedCourse {
                font-size: 25px;
                text-align: center;
                width: 100%;
            }

            option{
                padding-left: 20px;
            }
            
        </style>
    </head>
    <body>
                <div class="TopBar">
                    <center>Welcome Student</center>
                </div>

                <div class="MainContent">
                <h4> <center>Next Semester courses</center></h4>
					<label for = "Course1">Course: </label>
                    <?php
                        $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db');
                        $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course");//Here we select the table we want to pull from
                    ?>
				    <select name="course_name1" >   
                        <?php
                            while($rows = $fetchCourse->fetch_assoc()){
                                $COURSE_NAME = $rows['COURSE_NAME'];
                                echo "<option value = '$COURSE_NAME' >$COURSE_NAME</option>";
                            }
                        ?>
                    </select>
					</select>
					<br></br>
					<label for = "Course2">Course: </label>
					<?php
                        $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db');
                        $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course");//Here we select the table we want to pull from
                    ?>
					<select name="course_name2">
                        <?php
                            while($rows = $fetchCourse->fetch_assoc()){
                                $COURSE_NAME = $rows['COURSE_NAME'];
                                echo "<option value = '$COURSE_NAME' >$COURSE_NAME</option>";
                            }
                        ?>
                    </select>
					<br></br>
					<label for = "Course3">Course: </label>
					<?php
                        $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db');
                        $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course");//Here we select the table we want to pull from
                    ?>
					<select name="course_name3">
                        <?php
                            while($rows = $fetchCourse->fetch_assoc()){
                                $COURSE_NAME = $rows['COURSE_NAME'];
                                echo "<option value = '$COURSE_NAME' >$COURSE_NAME</option>";
                            }
                        ?>
                    </select>
					<br></br>
					<label for = "Course4">Course: </label>
					<?php
                        $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db');
                        $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course");//Here we select the table we want to pull from
                    ?>
					<select name="course_name4">
                        <?php
                            while($rows = $fetchCourse->fetch_assoc()){
                                $COURSE_NAME = $rows['COURSE_NAME'];
                                echo "<option value = '$COURSE_NAME' >$COURSE_NAME</option>";
                            }
                        ?>
                    </select>
					<br></br>
					<button type="submit">Submit</button>
                </div>
                </div>

                <div class="AdvisorNotes">
                    <h4>AdvisorNotes</h4>
                </div>

                <div class="Courses">
                    <h4>Courses</h4>
                        <?php
                            $courseSQL = NEW MySQLi('localhost', 'root', 'root','advising_db'); 
                            $fetchCourse = $courseSQL->query("SELECT COURSE_NAME FROM course"); //Here we select the table we want to pull from
                        ?>
                        <ul style ="list-style-type:none;">
                            <?php
                                while($rows = $fetchCourse->fetch_assoc()){
                                    $COURSE_NAME = $rows['COURSE_NAME'];
                                echo "<li value = '$COURSE_NAME' >$COURSE_NAME</li>";
                                }
                            ?>
                </div>

                <div class="CompletedCourse">
                    <h4>CompletedCourse</h4>
                </div>
    </body>
</html>
<!-- 					CSC 121: Introduction to Computer Science and Programming I
						CSC 123: Introduction to Computer Science and Programming II
						CSC 221: Assembly Language and Introduction to Computer Organization
						MAT 191: Calculus I
						MAT 193: Calculus II
						MAT 271: Foundations of Higher Mathematics
						MAT 281: Discrete Mathematics
						CSC 311: Data Structures
						CSC 321: Programming Languages
						CSC 331: Computer Organization
						CSC 341: Operating Systems
						CSC 395: Special Topics
						CSC 401: Analysis of Algorithms
						CSC 411: Artificial Intelligence
						CSC 421: Advanced Programming Languages
						CSC 431: Advanced Computer Organization
						CSC 441: Advanced Operating Systems
						CSC 451: Computer Networks
						CSC 453: Data Management
						CSC 455: World Wide Web Design and Management
						CSC 459: Security Engineering
						CSC 461: Computer Graphics I
						CSC 463: Computer Graphics II
						CSC 471: Compiler Construction
						CSC 490: Senior Seminar
						CSC 495: Special Topics
						MAT 367: Numerical Analysis I
						MAT 369: Numerical Analysis II
-->



<A HREF="./logout" STYLE="color: #800000">LOG OUT</A>

@endsection
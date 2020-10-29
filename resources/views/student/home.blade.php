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
            
        </style>
    </head>
    <body>
                <div class="TopBar">
                    <center>Welcome Student</center>
                </div>

                <div class="MainContent">
                <h4>Next Semester courses</h4>
					<label for = "Course1">Course: </label>
					<select name = "course1" id = "course1">
						<option value = "CSC">Course option 1</option>
						<option value = "CSC">CSC 121: Introduction to Computer Science and Programming I</option>
						<option value = "CSC">CSC 123: Introduction to Computer Science and Programming II </option>
						<option value = "CSC">CSC 221: Assembly Language and Introduction to Computer Organization</option>
						<option value = "CSC">MAT 191: Calculus I</option>
						<option value = "CSC">MAT 193: Calculus II</option>
						<option value = "CSC">MAT 271: Foundations of Higher Mathematics</option>
						<option value = "CSC">MAT 281: Discrete Mathematics</option>
						<option value = "CSC">CSC 311. Data Structures</option>
						<option value = "CSC">CSC 321. Programming Languages</option>
						<option value = "CSC">CSC 331. Computer Organization</option>
						<option value = "CSC">CSC 341. Operating Systems</option>
						<option value = "CSC">CSC 395. Special Topics</option>
						<option value = "CSC">CSC 401. Analysis of Algorithms</option>
						<option value = "CSC">CSC 411. Artificial Intelligence</option>
						<option value = "CSC">CSC 421. Advanced Programming Languages</option>
						<option value = "CSC">CSC 431. Advanced Computer Organization</option>
						<option value = "CSC">CSC 441. Advanced Operating Systems</option>
						<option value = "CSC">CSC 451. Computer Networks</option>
						<option value = "CSC">CSC 453. Data Management</option>
						<option value = "CSC">CSC 455. World Wide Web Design and Management</option>
						<option value = "CSC">CSC 459. Security Engineering</option>
						<option value = "CSC">CSC 461. Computer Graphics I</option>
						<option value = "CSC">CSC 463. Computer Graphics II</option>
						<option value = "CSC">CSC 471. Compiler Construction</option>
						<option value = "CSC">CSC 490. Senior Seminar</option>
						<option value = "CSC">CSC 495. Special Topics</option>
						<option value = "CSC">MAT 367. Numerical Analysis I</option>
						<option value = "CSC">MAT 369. Numerical Analysis II</option>
					</select>
					<br></br>
					<label for = "Course1">Course: </label>
					<select name = "course1" id = "course1">
						<option value = "CSC">Course option 2</option>
						<option value = "CSC">CSC 121: Introduction to Computer Science and Programming I</option>
						<option value = "CSC">CSC 123: Introduction to Computer Science and Programming II </option>
						<option value = "CSC">CSC 221: Assembly Language and Introduction to Computer Organization</option>
						<option value = "CSC">MAT 191: Calculus I</option>
						<option value = "CSC">MAT 193: Calculus II</option>
						<option value = "CSC">MAT 271: Foundations of Higher Mathematics</option>
						<option value = "CSC">MAT 281: Discrete Mathematics</option>
						<option value = "CSC">CSC 311. Data Structures</option>
						<option value = "CSC">CSC 321. Programming Languages</option>
						<option value = "CSC">CSC 331. Computer Organization</option>
						<option value = "CSC">CSC 341. Operating Systems</option>
						<option value = "CSC">CSC 395. Special Topics</option>
						<option value = "CSC">CSC 401. Analysis of Algorithms</option>
						<option value = "CSC">CSC 411. Artificial Intelligence</option>
						<option value = "CSC">CSC 421. Advanced Programming Languages</option>
						<option value = "CSC">CSC 431. Advanced Computer Organization</option>
						<option value = "CSC">CSC 441. Advanced Operating Systems</option>
						<option value = "CSC">CSC 451. Computer Networks</option>
						<option value = "CSC">CSC 453. Data Management</option>
						<option value = "CSC">CSC 455. World Wide Web Design and Management</option>
						<option value = "CSC">CSC 459. Security Engineering</option>
						<option value = "CSC">CSC 461. Computer Graphics I</option>
						<option value = "CSC">CSC 463. Computer Graphics II</option>
						<option value = "CSC">CSC 471. Compiler Construction</option>
						<option value = "CSC">CSC 490. Senior Seminar</option>
						<option value = "CSC">CSC 495. Special Topics</option>
						<option value = "CSC">MAT 367. Numerical Analysis I</option>
						<option value = "CSC">MAT 369. Numerical Analysis II</option>
					</select>
					<br></br>
					<label for = "Course1">Course: </label>
					<select name = "course1" id = "course1">
						<option value = "CSC">Course option 3</option>
						<option value = "CSC">CSC 121: Introduction to Computer Science and Programming I</option>
						<option value = "CSC">CSC 123: Introduction to Computer Science and Programming II </option>
						<option value = "CSC">CSC 221: Assembly Language and Introduction to Computer Organization</option>
						<option value = "CSC">MAT 191: Calculus I</option>
						<option value = "CSC">MAT 193: Calculus II</option>
						<option value = "CSC">MAT 271: Foundations of Higher Mathematics</option>
						<option value = "CSC">MAT 281: Discrete Mathematics</option>
						<option value = "CSC">CSC 311. Data Structures</option>
						<option value = "CSC">CSC 321. Programming Languages</option>
						<option value = "CSC">CSC 331. Computer Organization</option>
						<option value = "CSC">CSC 341. Operating Systems</option>
						<option value = "CSC">CSC 395. Special Topics</option>
						<option value = "CSC">CSC 401. Analysis of Algorithms</option>
						<option value = "CSC">CSC 411. Artificial Intelligence</option>
						<option value = "CSC">CSC 421. Advanced Programming Languages</option>
						<option value = "CSC">CSC 431. Advanced Computer Organization</option>
						<option value = "CSC">CSC 441. Advanced Operating Systems</option>
						<option value = "CSC">CSC 451. Computer Networks</option>
						<option value = "CSC">CSC 453. Data Management</option>
						<option value = "CSC">CSC 455. World Wide Web Design and Management</option>
						<option value = "CSC">CSC 459. Security Engineering</option>
						<option value = "CSC">CSC 461. Computer Graphics I</option>
						<option value = "CSC">CSC 463. Computer Graphics II</option>
						<option value = "CSC">CSC 471. Compiler Construction</option>
						<option value = "CSC">CSC 490. Senior Seminar</option>
						<option value = "CSC">CSC 495. Special Topics</option>
						<option value = "CSC">MAT 367. Numerical Analysis I</option>
						<option value = "CSC">MAT 369. Numerical Analysis II</option>
					</select>
					<br></br>
					<label for = "Course1">Course: </label>
					<select name = "course1" id = "course1">
						<option value = "CSC">Course option 4</option>
						<option value = "CSC">CSC 121: Introduction to Computer Science and Programming I</option>
						<option value = "CSC">CSC 123: Introduction to Computer Science and Programming II </option>
						<option value = "CSC">CSC 221: Assembly Language and Introduction to Computer Organization</option>
						<option value = "CSC">MAT 191: Calculus I</option>
						<option value = "CSC">MAT 193: Calculus II</option>
						<option value = "CSC">MAT 271: Foundations of Higher Mathematics</option>
						<option value = "CSC">MAT 281: Discrete Mathematics</option>
						<option value = "CSC">CSC 311: Data Structures</option>
						<option value = "CSC">CSC 321: Programming Languages</option>
						<option value = "CSC">CSC 331: Computer Organization</option>
						<option value = "CSC">CSC 341: Operating Systems</option>
						<option value = "CSC">CSC 395: Special Topics</option>
						<option value = "CSC">CSC 401: Analysis of Algorithms</option>
						<option value = "CSC">CSC 411: Artificial Intelligence</option>
						<option value = "CSC">CSC 421: Advanced Programming Languages</option>
						<option value = "CSC">CSC 431: Advanced Computer Organization</option>
						<option value = "CSC">CSC 441: Advanced Operating Systems</option>
						<option value = "CSC">CSC 451: Computer Networks</option>
						<option value = "CSC">CSC 453: Data Management</option>
						<option value = "CSC">CSC 455: World Wide Web Design and Management</option>
						<option value = "CSC">CSC 459: Security Engineering</option>
						<option value = "CSC">CSC 461: Computer Graphics I</option>
						<option value = "CSC">CSC 463: Computer Graphics II</option>
						<option value = "CSC">CSC 471: Compiler Construction</option>
						<option value = "CSC">CSC 490: Senior Seminar</option>
						<option value = "CSC">CSC 495: Special Topics</option>
						<option value = "CSC">MAT 367: Numerical Analysis I</option>
						<option value = "CSC">MAT 369: Numerical Analysis II</option>
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
                        <ul style ="list-style-type:none;">
                            <li>CSC 121: Introduction to Computer Science and Programming I</li>
                            <li>CSC 121: Introduction to Computer Science and Programming II</li>
                            <li>CSC 221: Assembly Language and Introduction to Computer Organization</li>                 
						    <li>CSC 221: Assembly Language and Introduction to Computer Organization</li>
                            <li>MAT 191: Calculus I</li>
                            <li>MAT 193: Calculus II</li>
                            <li>MAT 271: Foundations of Higher Mathematics</li>
                            <li>MAT 281: Discrete Mathematics</li>
                            <li>CSC 311: Data Structures</li>
                            <li>CSC 321: Programming Languages</li>
                            <li>CSC 331: Computer Organization</li>
						    <li>CSC 341: Operating Systems</li>
						    <li>CSC 395: Special Topics</li>
                            <li>CSC 401: Analysis of Algorithms</li>
                            <li>CSC 411: Artificial Intelligence</li>
                            <li>CSC 421: Advanced Programming Languages</li>
                            <li>CSC 431: Advanced Computer Organization</li>
                            <li>CSC 441: Advanced Operating Systems</li>
                            <li>CSC 451: Computer Networks</li>
                            <li>CSC 453: Data Management</li>
                            <li>CSC 455: World Wide Web Design and Management</li>
                            <li>CSC 459: Security Engineering</li>
                            <li>CSC 461: Computer Graphics I</li>
                            <li>CSC 463: Computer Graphics II</li>
                            <li>CSC 471: Compiler Construction</li>
                            <li>CSC 490: Senior Seminar</li>
                            <li>CSC 495: Special Topics</li>
                            <li>MAT 367: Numerical Analysis I</li>
                            <li>MAT 369: Numerical Analysis II</li>
                        </ul>
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



@endsection
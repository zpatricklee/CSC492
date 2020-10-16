@extends('master')

@section('content')
<!-- This File is curently in testing, will be updated to incorporate database sql table name = "class" --> 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
			
			nav {
				float: right;
				font-size: 10px;;
				padding: 20px;
			}
			.course	 {
				max-height:200px;
				overflow:scroll; 
			}

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
			<nav>
				<h1>Settings</h1>
			</nav>

            <!-- <div class="content"> -->
                <div class="title m-b-md" style = "position-ref full-height">
                    <center>Welcome Student</center>
                </div>

                <div id="classes" style = "position:absolute; left:200px;">
					<h2>Next Semester courses</h2>
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
						CSC 455: World Wide Web Design and Management</option>
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
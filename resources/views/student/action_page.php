<!DOCTYPE HTML PUBLIC>
<HTML lang="en">
    <HEAD>
        <TITLE>CSUDH ONLINE ADVISING</TITLE>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <STYLE>
        html, body{
            height: 100%
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .header-container {
            width: 100%;
            background-color: #800000;
            color: rgb(239, 186, 8);
            padding: 10px 20px;
        }
        .body-container {
            display: flex;
            height: 50%;
            padding-left: 10px;
            align-items: flex-end;
        }
        .error-notification {
            border: 3px outset red;
            color: red;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .error-message{
            color: red;
        }
        hr {
        margin-left: auto;
        margin-right: auto;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 20%; 
            border: 1px solid gray;   /*REMOVE THIS LATER*/
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        h2 {
            padding-left: 20px;
        }
        .td-container {
            text-align: center;
        }
        .alert {
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
        .register-info {
            padding-left: 15px;
            padding-top: 10px;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;  
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
    </STYLE>
    </HEAD>

    <BODY>
        <H1 CLASS="header-container">ONLINE ADVISING</H1>
        <div class="TopBar">
                    <center>Welcome Student</center>
                </div>

                <div class="MainContent">
                    <h4> <center>Next Semester courses</center></h4>
                    <h6>Submitted</h6>
                    <?php
                        //$user = Auth::guard('student')->user();
                        $COURSE_NAME1 = $_POST['course_name1'];
                        $COURSE_NAME2 = $_POST['course_name2'];
                        $COURSE_NAME3 = $_POST['course_name3'];
                        $COURSE_NAME4 = $_POST['course_name4'];

                        //DATABASE CONNECTION
                        $conn = new mysqli('localhost', 'root', 'root','advising_db');
                        if($conn->connect_error){
                          die('Connection Failed : '.$conn->connect_error);
                        }
                        else{
                            $stmt = $conn->prepare("INSERT INTO selected_course(COURSE_NAME1, COURSE_NAME2, COURSE_NAME3, COURSE_NAME4) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss",$COURSE_NAME1, $COURSE_NAME2, $COURSE_NAME3, $COURSE_NAME4);
                            $stmt->execute();
                            echo "success";
                            $stmt->close();
                            $submitted->close();
                        }
                    ?>
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
        <BR>
        <DIV CLASS="body-container">
            <P><A HREF="https://www.csudh.edu/" STYLE="color: #800000">CSUDH Homepage</A>  /  <A HREF="https://my.csudh.edu/" STYLE="color: #800000">MyCSUDH Homepage </A></P>
        </DIV>
    </BODY>  
</HTML>
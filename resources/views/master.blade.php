<!DOCTYPE HTML PUBLIC>
<HTML lang="en">
    <HEAD>
            <TITLE>CSUDH ONLINE ADVISING</TITLE>
    <STYLE>
        a {
            text-decoration: none;
        }
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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
            //display: flex;
            justify-content: center;
            align-items: center; 
            height: 30%; 
            text-align: center;
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
        .link-visited {
            color: rgb(239, 186, 8);
        }
        .logout {
            margin: auto;
            font-size: 20px;
            width: 7%;
            font-weight: bold;
            float: right;
            //border-style: solid;
        }

        .Topbar {
            font-size: 84px;
            text-indent: 7%;
            width: 100%;
            text-align: center;
            //border-style: solid;
        }
    </STYLE>
    </HEAD>

    <BODY>
        <H1 CLASS="header-container"><a href="./" class="link-visited">ONLINE ADVISING</a></H1>
        
        @yield('content')

        <BR>
        <DIV CLASS="body-container">
            <P><A HREF="https://www.csudh.edu/" STYLE="color: #800000">CSUDH Homepage</A>  /  <A HREF="https://my.csudh.edu/" STYLE="color: #800000">MyCSUDH Homepage </A></P>
        </DIV>
    </BODY>  
</HTML>
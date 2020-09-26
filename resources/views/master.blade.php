<!DOCTYPE HTML PUBLIC>
<HTML lang="en">
    <HEAD>
            <TITLE>CSUDH ONLINE ADVISING</TITLE>
    <STYLE>
        html, body{
            height: 100%
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
            border: 1px outset red;
            color: red;
            padding: 10px;
            margin-bottom: 10px;
        }
    </STYLE>
    </HEAD>

    <BODY>
        <H1 CLASS="header-container">ONLINE ADVISING</H1>
        
        @yield('content')

        <BR>
        <DIV CLASS="body-container">
            <P><A HREF="https://www.csudh.edu/" STYLE="color: #800000">CSUDH Homepage</A>  /  <A HREF="https://my.csudh.edu/" STYLE="color: #800000">MyCSUDH Homepage </A></P>
        </DIV>
    </BODY>  
</HTML>
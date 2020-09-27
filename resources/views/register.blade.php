@extends('master')

@section('content')

<STYLE>
    .register-info {
        padding-left: 15px;
        padding-top: 10px;
    }
    .register-container {
            display: flex;
            justify-content: center;
            align-items: center;  
        }
</STYLE>

<H2 class="h2">Register a new account</H2>
<HR>

<FORM ACTION="" METHOD="POST">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

    <DIV CLASS="register-info">
        <P>Please enter the following information to create your new account:</P>
    </DIV>

    <DIV CLASS="register-container">
        <TABLE>
            <TR>
                <TD><INPUT TYPE="TEXT" NAME="FirstName" MAXLENGTH="20" SIZE="20" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="LastName" MAXLENGTH="20" SIZE="20" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="MI" MAXLENGTH="1" SIZE="1" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="Suffix" MAXLENGTH="5" SIZE="3" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <TR ALIGN="center">
                <TD>First Name</TD>
                <TD>Last Name</TD>
                <TD>M.I.</TD>
                <TD>Suffix</TD>
            </TR> 
        </TABLE>
    </DIV>
    <BR>
    <DIV CLASS="register-container">
        <TABLE>
            <TR>
                <TD ALIGN="right">Email:</TD>
                <TD><INPUT TYPE="TEXT" NAME="Email" MAXLENGTH="30" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>            
            </TR>
        </TABLE>
    </DIV>
    <DIV CLASS="register-container">
        <BR><BR><BR><BR><INPUT TYPE="SUBMIT" NAME="Register" VALUE="Send Confirmation Email">
    </DIV>
</FORM>

@endsection
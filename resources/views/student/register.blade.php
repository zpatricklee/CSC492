@extends('master')

@section('content')

<H2 class="h2">STUDENTS | Register a new account</H2>
<HR>

<!-- Error-handling -->
@if (session('warning'))
	<div class="alert alert-warning">
		{!! session('warning') !!}
	</div>
@endif
@if ($errors->any())
	<DIV CLASS="error-notification">
		Please fix the following errors to continue:
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</DIV>
@endif

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
            <TR>
                <TD ALIGN="right"><br>Password:</TD>
                <TD><br><INPUT TYPE="PASSWORD" NAME="Password" MAXLENGTH="30" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <tr>
                <td></td>
                <td align="center"><br><input type="submit" name="Register" value="Send Confirmation Email"></td>
            </tr>
        </TABLE>
    </DIV>
</FORM>

@endsection
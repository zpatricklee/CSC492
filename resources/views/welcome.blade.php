@extends('master')

@section('content')

<H2 class="h2">Welcome to CSUDH Online Advising</H2>
<HR>

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

    <DIV class="login-container">   
        <TABLE CLASS="center">
            <TR>
                <TD ALIGN="right">Email:</TD>
                <TD><INPUT TYPE="TEXT" NAME="Email" MAXLENGTH="30" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <TR>
                <TD>Password:</TD>
                <TD><INPUT TYPE="PASSWORD" NAME="Password" MAXLENGTH="30" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <TR>
                <TD></TD>
                <TD ALIGN="center"><BR><INPUT TYPE="SUBMIT" VALUE="LOGIN"></TD>
            </TR>
            <TR>
                <TD></TD>
                <TD CLASS="td-container"><BR><A HREF="./register">Don't have an account? Create one</A></TD>
            </TR>
        </TABLE>
    </DIV>
</FORM>

@endsection


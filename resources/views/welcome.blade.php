@extends('master')

@section('content')

<STYLE>
    .home-container {
        display: flex;
        justify-content: center;
        padding-bottom: 30px;
    }
    .home-container div {
        padding: 10px 30px;
    }
    .home-container div:first-child {
        border-right: 1px solid gray;
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
</STYLE>

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
                <TD ALIGN="right">EMAIL:</TD>
                <TD><INPUT TYPE="TEXT" NAME="Email" MAXLENGTH="50" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <TR>
                <TD>PASSWORD:</TD>
                <TD><INPUT TYPE="TEXT" NAME="Password" MAXLENGTH="20" SIZE="30" VALUE="" STYLE="background-color: #F5F5F5"></TD>
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


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

<script type="text/javascript">
    function onSelectChange(){
        var sel = document.getElementById('Title');
        var userStr = sel.options[sel.selectedIndex].text;

        if(userStr == 'Other'){
            document.getElementById('OtherTitle').disabled = false;
        }
        else{
            document.getElementById('OtherTitle').disabled = true;
        }
    }
</script>

<FORM ACTION="" METHOD="POST">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

    <DIV CLASS="register-info">
        <P>Please enter the following information to create your new account:</P>
    </DIV>

    <DIV CLASS="register-container">
        <TABLE>
            <TR>
                <td>
                    <select name="Title" id="Title" onchange="onSelectChange()" style="background-color: #F5F5F5">
                        <option></option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="text" name="OtherTitle" id="OtherTitle" disabled="disabled" maxlength="5" size="1"/>
                </td>
                <TD><INPUT TYPE="TEXT" NAME="FirstName" MAXLENGTH="20" SIZE="20" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="LastName" MAXLENGTH="20" SIZE="20" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="MI" MAXLENGTH="1" SIZE="1" VALUE="" STYLE="background-color: #F5F5F5"></TD>
                <TD><INPUT TYPE="TEXT" NAME="Suffix" MAXLENGTH="5" SIZE="3" VALUE="" STYLE="background-color: #F5F5F5"></TD>
            </TR>
            <TR ALIGN="center">
                <td align="left" style="padding-left: 15px">Title</td>
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
@extends('master')

@section('content')

<h2 class="h2">ADVISERS | Register a new account</h2>
<hr>

<!-- Error-handling -->
@if (session('warning'))
	<div class="alert alert-warning">
		{!! session('warning') !!}
	</div>
@endif
@if ($errors->any())
	<div class="error-notification">
		Please fix the following errors to continue:
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
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

<form action="" method="post">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

    <div class="register-info">
        <p>Please enter the following information to create your new account: </p>
    </div>

    <div class="register-container">
        <table>
            <tr>
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
                <td><input type="text" name="FirstName" maxlength="20" size="20" value="" style="background-color: #F5F5F5"></td>
                <td><input type="text" name="LastName" maxlength="20" size="20" value="" style="background-color: #F5F5F5"></td>
                <td><input type="text" name="MI" maxlength="1" size="1" value="" style="background-color: #F5F5F5"></td>
                <td><input type="text" name="Suffix" maxlength="5" size="3" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr ALIGN="center">
                <td align="left" style="padding-left: 15px">Title</td>
                <td>First name</td>
                <td>Last name</td>
                <td>M.I.</td>
                <td>Suffix</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="register-container">
        <table>
            <tr>
                <td ALIGN="right">Email:</td>
                <td><input type="text" name="Email" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>            
            </tr>
            <tr>
                <td align="right">Department:</td>
                <td><input type="text" name="Department" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr>
                <td align="right">Office:</td>
                <td><input type="text" name="Office" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr>
                <td ALIGN="right"><br>Password:</td>
                <td><br><input type="password" name="Password" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><br><input type="submit" name="Register" value="Send Confirmation Email"></td>
            </tr>
        </table>
    </div>
</form>

@endsection
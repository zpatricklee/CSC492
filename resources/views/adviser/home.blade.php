@extends('adviser_master')

@section('content')

<style>
    .top-bar {
        border-style: solid;
        font-size: 40px;
        width: 100%;
        text-indent: 7%;
        text-align: center;
    }
</style>

<div class="top-bar">
    Adviser Home Page
    <div class="logout">
        <A HREF="./logout" >LOG OUT</A>
    </div>
</div>
<hr>

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
@if (session('message'))
    <div class="alert alert-warning">
        {{ session('message') }}
    </div>
@endif

<form action="" method="post">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

    <div class="login-container">
        <table>
            <tr>
                <td align="right">Student ID:</td>
                <td>
                    <input type="text" name="StudentID" maxlength="9" size="15" style="background-color: #F5F5F5"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><input type="submit" value="View Student Info"></td>
            </tr>
        </table>
    </div>
</form>

@endsection
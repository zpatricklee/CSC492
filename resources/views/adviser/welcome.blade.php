@extends('adviser_master')

@section('content')

<h2 class="h2">ADVISERS | Welcome to CSUDH Online Advising</h2>
<hr>
<!-- Error-Handling -->
@if(session('warning'))
    <div class="alert alert-warning">
        {!! session('warning') !!}
    </div>
@endif
@if($errors->any())
    <div class="error-notification">
        Please fix the following errors to continue:
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="" method="post">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

    <div class="login-container">
        <table class="center">
            <th></th><th style="font-size: 200%">SIGN-IN</th>
            <tr>
                <td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td>
            </tr>
            <tr>
                <td align="right">Email:</td>
                <td><input type="text" name="Email" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr>
                <td align="right">Password:</td>
                <td><input type="password" name="Password" maxlength="30" size="30" value="" style="background-color: #F5F5F5"></td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><br><input type="submit" value="LOGIN"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td-container"><br><a href="./adviser/register">Don't have an account? Create one</a></td>
            </tr>
        </table>
    </div>
</form>

@endsection
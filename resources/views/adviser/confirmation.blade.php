@extends('master')

@section('content')

<DIV CLASS="register-info">
    <P STYLE="font-weight: bold">A verification link has been sent to your email account at: {{ $entry->EMAIL ?? ''}}</P>
    <P>Please click on the link that has just been sent to your email account to verify your email and continue the registration process.</P>
    <P><A HREF="./adviser">Return to Welcome/Login Page</A>
</DIV>

@endsection
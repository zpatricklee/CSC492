@extends('master')

@section('content')

<H2 class="h2">Register a new account</H2>
<HR>
<FORM ACTION="" METHOD="POST">

<!-- Laravel's security out of the box -->
{{ csrf_field() }}

</FORM>

@endsection
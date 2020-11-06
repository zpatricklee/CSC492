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
        <A HREF="./logout" STYLE="color: #800000">LOG OUT</A>
    </div>
</div>
<HR>



@endsection
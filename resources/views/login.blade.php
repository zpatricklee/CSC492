@extends('master')

@section('content')

<style>
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
</style>

<h2>Welcome to CSUDH Online Advising</h2>
<hr>
<div class="home-container">
    <div>
        <h3>Register a new account</h3>
        <form action="" method="GET">
            <button>Register</button>
        </form>
    </div>
        
    <div>
        <h3>Login</h3>
            <button>Login</button>
    </div>
</div>


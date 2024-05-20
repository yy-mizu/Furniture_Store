@extends('layouts.customerLayout')
@section('title','Log in || furniture')
@section('content')

<div class="link-connect">
        <span>Home</span>
        <span>My Account</span>
   </div>
   <div class="form-container">
    <div class="login-form">
        <h1>Log In</h1>
        <form action="">
            <label for="username">Username or email address <span>*</span></label>
            <input type="text" id="username">

            <label for="password">Username or email address <span>*</span></label>
            <input type="password" id="password">
            <div>
                <button>LOG IN</button>
                <!-- <p>Remember me</p> -->
            </div>
            <p>Lost your password?</p>
        </form>
    </div>
    <div class="register-form">
        <h1>Register</h1>
        <form action="">
            <label for="email">Username or email address <span>*</span></label>
            <input type="email" id="email">
        
            <label for="password1">Username or email address <span>*</span></label>
            <input type="password" id="password1">
            <div>
                <button>REGISTER</button>
                <!-- <p>Remember me</p> -->
            </div>
    </div>
   </div>
@endsection


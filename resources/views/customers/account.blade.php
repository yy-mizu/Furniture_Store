@extends('layouts.customerLayout')

@section('title' , 'My Account')

@section('navbar-map')
    <p>Home</p>
@endsection

@section('customer-main')
<div class="form-wrapper">
    <div class="login-form-container">
        <form action="" class="login-form">
            <h5>Login</h5>

            <label for="name">Username or Email Address</label>
            <input type="text">

            <label for="password">Password</label>
            <input type="password">
        

            <div class="login-form-buttons">
                <button type="submit" class="primary-btn1">Login</button>
                <button type="submit" class="primary-btn2">Forgot password?</button>
            </div>
        </form>
    </div>

    <div class="register-form-container">
        <form action="" class="register-form">
            <h5>Register</h5>

            <label for="name">Email Address</label>
            <input type="text">

            <label for="password">Password</label>
            <input type="password">
        

            <div class="login-form-buttons">
                <button type="submit" class="login-button">Register</button>
        
            </div>
        </form>
    </div>

</div>
@endsection
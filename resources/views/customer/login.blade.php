@extends('layouts.customerLayout')
@section('title', 'Log in || furniture')
@section('content')

    <div class="link-connect">
        <span>Home</span>
        <span>My Account</span>
    </div>
    <div class="form-container">
        
        <div class="login-form">

            <h1>Log In</h1>
            @if(session()->has('jsAlert'))
    <script>
        alert('{{ session()->get('jsAlert') }}');
    </script>
@endif
            <form action="{{route('customer.login.process')}}" method="POST">
                @csrf
                <input type="hidden" name="usertype" value="customer">
                <label for="username">Username <span>*</span></label>
                <input type="text" id="name" name="name">

                <label for="password">Password<span>*</span></label>
                <input type="password" id="password" name="password">
                <div>
                    <button>LOG IN</button>
                    <!-- <p>Remember me</p> -->
                </div>
                <p>Lost your password?</p>
            </form>
        </div>



        <div class="register-form">
            <h1>Register</h1>
            @if (session('success'))
                <div class="alert alert-success">
                 <span style="color: green"> {{ session('success') }} </span>  
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><span style="color: red">{{ $error }}</span></li>
                        @endforeach 
                    </ul>
                </div>
            @endif
            <form action="{{ route('customer.register.process') }}" method= 'POST' enctype="multipart/form-data">

                @csrf

                <label for="image">Choose an image<span>*</span></label>
                <input type="file" id="image" name="image" style="padding:10px">

                <label for="name">Username<span>*</span></label>
                <input type="text" id="name" name="name">

                <label for="email">Email <span>*</span></label>
                <input type="email" id="email" name="email">

                <label for="phone">Phone <span>*</span></label>
                <input type="number" id="phone"name="phone">

                <label for="address">Address<span>*</span></label>
                <textarea name="address" id="address" style="width: 75%"></textarea>

                <label for="password1">Password<span>*</span></label>
                <input type="password" id="password1" name="password1">
                <div>
                    <button type="submit">REGISTER</button>
                    <!-- <p>Remember me</p> -->
                </div>
        </div>
    </div>
@endsection

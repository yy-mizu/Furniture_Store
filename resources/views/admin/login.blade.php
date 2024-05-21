<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-wrapper">
        <div class="img-container">
            <img src="{{ asset('img/admin/login-bg.jpg') }}" alt="" class="form-img">
        </div>

        <div class="login-form-wrapper">

            <div class="login-form-container">

                <form action="{{ route('admin.login.process') }}" class="login-form" method="POST">
                    @csrf

                    <h3 class="form-title">Admin Login</h3>

                    <input type="hidden" value="admin" name="usertype">
                    <label for="name">Username</label>
                    <input type="text" name="name">
                    @if (session('error'))
                       <small style="color: red;
                                    margin-bottom: 1rem"
                                    >{{ session('error') }} </small> 
                    @endif

                    <label for="password">Password</label>
                    <input type="text" name="password">

                    <button class="sec-btn1">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

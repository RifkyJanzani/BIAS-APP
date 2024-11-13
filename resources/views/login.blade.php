<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'BIAS APP') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-app">
        <div class="login-container shadow-sm rounded border">
            <div style="color: rgba(0, 0, 0, 0.147)">
                BIAS App
            </div>
            <div class="login-content">
                <div class="welcome-text">
                    <img src="{{ asset('images/BIAS LOGO.png') }}" alt="">
                    <h1><strong>Selamat Datang!</strong></h1>
                    <p>Silakan login ke akunmu!</p>
                </div>
                <div class="login-form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-primary" style="width: 50%"><b>LOGIN</b></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
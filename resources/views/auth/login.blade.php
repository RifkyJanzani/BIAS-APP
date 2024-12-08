<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'BIAS APP') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="login-app">
        <div class="login-container shadow-sm rounded border">
            <div style="color: rgba(0, 0, 0, 0.147)">
                BIAS App
            </div>
            <div class="login-content">
                <div class="welcome-text">
                    <img src="{{ asset('images/BIAS LOGO.png') }}" alt="BIAS Logo">
                    <h1><strong>Selamat Datang!</strong></h1>
                    <p>Silakan login ke akunmu!</p>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="email" aria-label="Username" aria-describedby="basic-addon1" value="{{ old('email') }}" required autofocus autocomplete="username">
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1" required autocomplete="current-password">
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" style="width: 50%"><b>LOGIN</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

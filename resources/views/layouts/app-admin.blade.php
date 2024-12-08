<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJf+R8KkApWGbfsdG6UrdgD5xjOjV5vV6CwvDJitp9Ol5+dcQj19Hf4vvsU1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>{{ config('app.name', 'BIAS APP') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Tp5xxrO6bb5Gk5K6aF5tIkGpyU2b6n6tPjmwVeM8cX2vj6J" crossorigin="anonymous"></script>
    <header id="header-nav">
        <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="{{ asset('images/Burger.svg') }}" alt="Menu"></button>
        <div class="dropdown">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="profile-image" src="{{ asset('images/Profile Icon.png') }}" alt="Profile">
            </button>
            <div class="dropdown-menu" style="height: 0; padding: 0;">
                <div class="card text-bg-light mb-3 ">
                    <div class="dropdown-item">
                        <div class="card-header">Halo, {{Auth()->user()->name}}</div>
                        <div class="card-body">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </header>
    <div id="prop">
        <p style="background-color: rgba(0, 0, 0, 0)">.</p>
    </div>
    <aside>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasScrollingLabel"><b>BIAS App</b></h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav-list">
                    <li data-bs-dismiss="offcanvas">
                        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Dashboard Icon.svg') }}" alt="">Dashboard
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/admin/akun" class="{{ request()->is('admin/akun*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Profile Icon.png') }}" alt="">Akun
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/admin/kelas" class="{{ request()->is('admin/kelas*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Kelas Icon.svg') }}" alt="">Kelas
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/admin/daftar" class="{{ request()->is('admin/daftar*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Daftar Icon.svg') }}" alt="">Daftar
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/admin/penilaian" class="{{ request()->is('admin/penilaian*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/E-Rapor Icon.svg') }}" alt="">Penilaian
                        </a>
                    </li>
                </ul>
            </div>
        </div>  
    </aside>
    <div id="app">
        @yield('content')
    </div>
</body>

<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>
</html>
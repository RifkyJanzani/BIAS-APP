<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucfirst(explode('.', Route::currentRouteName())[1]) }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header id="header-nav">
        <button class="btn burger-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <img src="{{ asset('images/Burger.svg') }}" alt="Menu">
        </button>
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
                        <a href="/guru/dashboard" class="{{ request()->is('guru/dashboard*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Dashboard Icon.svg') }}" alt="">Dashboard
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/guru/kelas" class="{{ request()->is('guru/kelas*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/Kelas Icon.svg') }}" alt="">Kelas
                        </a>
                    </li>
                    <li data-bs-dismiss="offcanvas">
                        <a href="/guru/e-rapor" class="{{ request()->is('guru/e-rapor*') ? 'selected' : '' }}">
                            <p><b>|</b></p><img src="{{ asset('images/E-Rapor Icon.svg') }}" alt="">E-Rapor
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div id="app">
        @yield('content')
    </div>
    <script>
        const offcanvas = document.getElementById('offcanvasScrolling');
        offcanvas.addEventListener('show.bs.offcanvas', function () {
            document.body.classList.add('sidebar-open');
        });

        offcanvas.addEventListener('hide.bs.offcanvas', function () {
            document.body.classList.remove('sidebar-open');
        });
    </script>
</body>
</html>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: rgb(249, 249, 249);
        }
    </style>


    @yield('head')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">اعضاء</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-top: 9px;">

                        {{ __('التصنيفات') }}
                        <i class="bi bi-list"></i>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('الناشرون') }}
                            <i class="bi bi-table"></i>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">
                            {{ __('المؤلفون') }}
                            <i class="bi bi-pen"></i>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('مشترياتي') }}
                            <i class="bi bi-cart"></i>

                        </a>
                    </li>
                    @auth
                        @if (auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}">
                                    {{ __('إدارة') }}
                                    <i class="bi bi-gear-wide-connected"></i>

                                </a>
                            </li>
                    </ul>
                    @endif
                @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">{{ __('تسجيل الدخول') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">{{ __('انشاء حساب') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a class="nav-link" href="#" id="navbarDropdownMenuAvatar" data-bs-toggle="dropdown">

                                <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle" height="32"
                                    alt="{{ Auth::user()->name }}" loading="lazy" />

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">

                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        {{ __('الملف الشخصي') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>
                                    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">

        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @yield('scripts')

</body>

</html>

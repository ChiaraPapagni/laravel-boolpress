<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- FontAwesome 5.15.3 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" .
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="boolpress Logo">
            </a>

            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </header>

        <div class="container-fluid">
            <div class="row justify-content-end">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('admin.dashboard') ? 'active' : '' }}"
                                    aria-current="page" href="{{route('admin.dashboard')}}">
                                    <i class="fas fa-shield-alt fa-fw"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{Route::is('admin.posts.*') ? 'active' : '' }}"
                                    href="{{route('admin.posts.index')}}">
                                    <i class="far fa-edit fa-fw"></i>
                                    Posts
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{Route::is('admin.categories.*') ? 'active' : '' }}"
                                    href="{{route('admin.categories.index')}}">
                                    <i class="far fa-bookmark fa-fw"></i>
                                    Categories
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{Route::is('admin.tags.*') ? 'active' : '' }}"
                                    href="{{route('admin.tags.index')}}">
                                    <i class="fas fa-hashtag fa-fw"></i>
                                    Tags
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{Route::is('admin.contacts.*') ? 'active' : '' }}"
                                    href="{{route('admin.contacts.index')}}">
                                    <i class="far fa-envelope fa-fw"></i>
                                    Messages
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
</body>

</html>
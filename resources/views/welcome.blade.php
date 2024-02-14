<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>B-Doctors</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&family=Manrope:wght@400;600&family=Noto+Sans:wght@400;600;700;800&family=Nunito:ital,wght@0,300;0,400;0,600;0,800;1,300;1,400;1,600&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Outfit:wght@400;700&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="welcome_page">
    <div class="bg-dark position-fixed w-100 top-0 left-0 navbar_welcome navbar navbar-expand-md px-3 justify-content-between">
        <span class="text-light title fs-5">B-DOCTORS</span>
        @if (Route::has('login'))
        <div class="d-flex p-2 justify-content-between align-items-center">
            @auth
            <a href="{{ url('/admin') }}" class="">Home</a>
            @else
            <div>
                <a href="{{ route('login') }}" class="px-2 text-decoration-none text-light">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-2 text-decoration-none text-light">Register</a>
            </div>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <div class="banner fs-4 ms-3 col-4">
        <span>Register your profile with</span>
        <h1 class="title">B-Doctors</h1>
        <span>to gain the visibility you need</span>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="icon" type= "image/x-icon" href="{{ asset('/img/favicon.ico') }}">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

</head>
<body>

@auth

<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/questions">Questions</a></li>
        <li><a href="/register">Register</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    {{ __('Logout') }}
                </button>
            </form>
        </li>
    </ul>
</nav>

{{-- @else
<nav>
    <ul>
        <li><a href="/login">Login</a></li>
    </ul>
</nav>
     --}}
@endauth

@yield('content')

<script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
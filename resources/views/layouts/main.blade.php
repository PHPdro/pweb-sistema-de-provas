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
@if(Auth::user()->new_user == 0)
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
        <li><a href="/questions">Questions</a></li>
        @endif
        <li><a href="/exams">Exams</a></li>
        @if (Auth::user()->admin == 1)
        <li><a href="/register">Register</a></li>
        <li><a href="/users">Users</a></li>
        @endif
        <li style="float:right;">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">
                    {{ __('Logout') }}
                </button>
            </form>
        </li>
    </ul>
</nav>
@endif
@endauth

@yield('content')

<script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
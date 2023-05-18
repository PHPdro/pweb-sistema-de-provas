<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <style>
        body{
            background-color: #333;
        }

        h1{
            color: #ebd955;
        }

    </style>

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="icon" type= "image/x-icon" href="{{ asset('/img/favicon.ico') }}">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

</head>
<body>

<h1>@yield('error')</h1>

<div class="card" style="background-color: #111;">
    
    <h2>@yield('message')</h2>

    <div class="card-content">   

        <img src=@yield('source') alt="Sad capybara" width="100%">

    </div>
    
</div>

@yield('content')
    
</body>
</html>
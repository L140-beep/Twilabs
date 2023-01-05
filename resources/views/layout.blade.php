<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Главная')</title>
    <link rel="stylesheet" type="text/css" href='{{asset("css/layout_v1.css")}}'/>
    <link rel='icon' href='{{asset("logo.png")}}''>
    @stack('styles')
</head>
<body>
    <header>
        <a class='logo' href='/feed'>Twilabs</a>
        <label class='menu'>
            <a href={{'/users/' . $current_username}}> My profile</a>
            <a class='exit' href='exit'>Exit </a>
        </label>
    </header>
    @yield('content')
    @yield('posts')
    <footer>
        <hr>
        (с) Copyright, {{date('Y')}}
        Footer
    </footer>
</body>
</html>
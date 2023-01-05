<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Главная')</title>
    <link rel="stylesheet" href="./css/header.css"/>
    @stack('styles')
</head>
<body>
    <header>
        Twilabs
        <a href="contacts">Contacts</a>
        <a href="company">Company</a>
        <a href='exit'>Exit </a>
    </header>
    <hr>
    @yield('content')

    <footer>
        (с) Copyright, {{date('Y')}}
        Footer
    </footer>

    <script src="main.js"> </script>
</body>
</html>
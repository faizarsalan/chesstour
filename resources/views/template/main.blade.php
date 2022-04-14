<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/main.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="#news">Categories</a></li>
        <li><a href="#news">Categories</a></li>
        <li><a href="/category">Categories</a></li>
        <li><a href="/player">Players</a></li>
        <li><a href="/country">Countries</a></li>
        <li><a href="/">Home</a></li>
    </ul>
    @yield('content')
</body>
</html>

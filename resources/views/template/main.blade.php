<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Chess Tour 2022</title>
</head>
<body>
    <div class="topper">
        <strong>CHESS TOUR</strong>
    </div>
    <ul>
        <li><a href="/time">Time Control</a></li>
        <li><a href="/category">Categories</a></li>
        <li><a href="/tourney">Tournaments</a></li>
        <li><a href="/player">Players</a></li>
        <li><a href="/country">Countries</a></li>
        <li><a href="/">Home</a></li>
    </ul>
    @yield('content')
    <div class="bottom">
        <small>&copy;2022 Muhammad Faiz Arsalan Utomo</small>
    </div>
</body>
</html>

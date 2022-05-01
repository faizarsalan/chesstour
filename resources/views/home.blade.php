@extends('template.main')
@section('content')
    <div class="homedisplay">
        <div class="bigdisplay">
            <div class="subdisplay">
                <a href="/">Home</a>
                <p>Directly go to our homepage!</p>
            </div>
            <div class="subdisplay">
                <a href="/player">Players</a>
                <p>Find your favorite chess player!</p>
            </div>
            <div class="subdisplay">
                <a href="/country">Countries</a>
                <p>Find your favorite countries!</p>
            </div>
        </div>
        <div class="bigdisplay">
            <div class="subdisplay">
                <a href="/time">Time Controls</a>
                <p>Play casually or a world level championship? Pick your own time control!</p>
            </div>
            <div class="subdisplay">
                <a href="/category">Categories</a>
                <p>Bullet, Chess, Rapid, or Chess960? Find your playstyle!</p>
            </div>
            <div class="subdisplay">
                <a href="/venue">Venues</a>
                <p>A collection of your favourite venues!</p>
            </div>
        </div>
    </div>
@endsection

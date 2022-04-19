@extends('template.main')
@section('content')
<div class="addbtn">
    <button id="addRow">Add Row</button>
</div>
<form action="/tourney/insert" method="POST">
    @csrf
    <div id="items">
        <div>
            <strong>Venue</strong>
            <input type="text" name="venue" placeholder="Venue Name" required>
            <select name='country'>
                @foreach ($data as $item)
                    <option value='{{ $item->id_Country }}'> {{ $item->name }} </option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="addbtn">
        <button id="submitRow" type="submit" onclick="return empty()">Save</button>
    </div>
</form>

<script src="{{ asset('js/addtourney.js') }}"></script>
<template id="organizer">
    <strong>Organizer</strong>
    <select name='organizer[]'>
        @foreach ($dataorg as $item)
            <option value='{{ $item->id_Organizer }}'> {{ $item->name }} </option>
        @endforeach
    </select>
</template>

<template id="timecontrol">
    <strong>Time Control</strong>
    <select name='timecontrol[]'>
        @foreach ($datatc as $item)
            <option value='{{ $item->id_Time_Control }}'> {{ $item->name }} </option>
        @endforeach
    </select>
</template>
@endsection

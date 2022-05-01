@extends('template.main')
@section('content')
<div class="addbtn">
    <button id="addRow">Add Row</button>
</div>
<form action="/player/insert" method="POST">
    @csrf
    <div id="items">
        <div>
            <strong>Country of Origin</strong>
            <input type="text" name="country_name" id="" placeholder="Country Name">
            <input type="text" name="country_capital" id="" placeholder="Capital Name">
        </div>

    </div>
    <div class="addbtn">
        <button id="submitRow" type="submit" onclick="return empty()">Save</button>
    </div>
</form>

<script src="{{ asset('js/addplayer.js') }}"></script>
@endsection

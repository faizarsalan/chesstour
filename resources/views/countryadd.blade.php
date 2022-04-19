@extends('template.main')
@section('content')
<script defer src="{{ asset('js/addcountry.js') }}"></script>
<div class="addbtn">
    <button id="addRow">Add Row</button>
</div>
    <form action="/country/insert" method="POST">
        @csrf
        <div id="items">
        </div>
        <div class="addbtn">
            <button id="submitRow" type="submit" onclick="return empty()">Save</button>
        </div>
    </form>

@endsection

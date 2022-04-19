@extends('template.main')
@section('content')
<div class="addbtn">
    <button id="addRow">Add Row</button>
</div>
<form action="/category/insert" method="POST">
    @csrf
    <div id="items">

    </div>
    <div class="addbtn">
        <button id="submitRow" type="submit" onclick="return empty()">Save</button>
    </div>
</form>

<script src="{{ asset('js/addcategory.js') }}"></script>

@endsection

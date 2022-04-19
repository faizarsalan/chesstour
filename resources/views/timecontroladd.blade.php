@extends('template.main')
@section('content')
<div class="addbtn">
    <button id="addRow">Add Row</button>
</div>
<form action="/time/insert" method="POST">
    @csrf
    <div id="items">
    </div>
    <div class="addbtn">
        <button id="submitRow" type="submit" onclick="return empty()">Save</button>
    </div>
</form>

<script src="{{ asset('js/addtime.js') }}"></script>
<template id="category">
    <input type="text" name="time_name[]" placeholder="Time Control Name" required>
    <input type="text" name="time_initialtime[]" placeholder="Initial Time" required>
    <input type="text" name="time_incrementtime[]" placeholder="Increment Time" required>
    <strong>Category</strong>
    <select name='category[]'>
        @foreach ($datacat as $item)
            <option value='{{ $item->id_Category }}'> {{ $item->name }} </option>
        @endforeach
    </select>
</template>
@endsection

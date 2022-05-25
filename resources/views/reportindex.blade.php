@extends('template.main')
@section('content')
<div class="homedisplay">
    <form action="/report/query" method="post">
        @csrf
        <div class="bigdisplay">
            <div class="subdisplay">
                <a>Select the Country!</a>
            </div>

            <div class="subdisplay">
                <select name="country" required>
                    @foreach ($data as $item)
                        <option value='{{ $item->id_Country }}'> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="subdisplay">
                <a>Set the Minimum Prize!</a>
            </div>

            <div class="subdisplay">
                <input type="number" name="prize" id="" min="0" required>
            </div>

            <div class="addbtn">
                <button id="submitRow" type="submit" onclick="return empty()">Create Report</button>
            </div>
        </div>
    </form>
</div>
@endsection

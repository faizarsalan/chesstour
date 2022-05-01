@extends('template.main')
@section('content')
<h1 class="title">Tournaments in {{ $venue }}</h1>
<form action="/tourney/update" method="post">
    @csrf
    <div id="items">
        @foreach ($tourney as $item)
            <label for="name">Tournament Name</label>
            <input type="text" name="tourneyname[]" id="" value="{{ $item -> name }}">

            <label for="prize">Prize</label>
            <input type="text" name="tourneyprize[]" id="" value="{{ $item -> prize }}">

            <strong>Organizer</strong>
            <select name='organizer[]'>
                @foreach ($org as $orgitem)
                    <option value='{{ $orgitem->id_Organizer }}' {{ ( $orgitem->name == $item->orgname) ? 'selected' : '' }}> {{ $orgitem->name }} </option>
                @endforeach
            </select>

            <strong>Time Control</strong>
            <select name='timecontrol[]'>
                @foreach ($tc as $tcitem)
                    <option value='{{ $tcitem->id_Time_Control }}' {{ ( $tcitem->name == $item->tcname) ? 'selected' : '' }}> {{ $tcitem->name }} </option>
                @endforeach
            </select>
            <input type="hidden" name="id[]" value="{{ $item->id_Tournament }}">
            @endforeach
    </div>

    <button type="submit"
                            style="width: 5.5vw;background-color:#28A745;height:2vw;border-radius:1vw;border:none;color:white">Save</button>
</form>
@endsection

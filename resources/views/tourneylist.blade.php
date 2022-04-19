@extends('template.main')
@section('content')
<h1 class="title">Tournaments</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tournament Name</th>
              <th scope="col">Prize Pool</th>
              <th scope="col">Venue Name</th>
              <th scope="col">Organizer Name</th>
              <th scope="col">Time Control</th>
              <th scope="col">Action</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $model)
              <tr>
                <td>{{ $model->id_Tournament }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->prize}}</td>
                <td>{{ $model->venuename}}</td>
                <td>{{ $model->orgname}}</td>
                <td>{{ $model->tcname}}</td>
                <td><button class="agree"><a href="#open-update{{ $i }}">edit</a></button></td>
                <td>
                  <form action="/tourney/remove/{{ $model->id_Tournament }}" method="POST">
                  @csrf
                    <div>
                      <button class="remove" type="submit">remove</button>
                    </div>
                  </form>
                </td>
                <div id="open-update{{ $i }}" class="modal-window">
                  <div class="outside">
                      <div class="inside">
                          <a href="#" title="Close" class="modal-close" style="margin-bottom: 5vh">X</a>
                          <h1>Edit the Tournament!</h1>
                          <form action="/tourney/update/{{$model->id_Tournament}}" method="post">
                            @csrf
                            <label for="Name">Name</label>
                            <input required type="text" name="name" id="" value="{{$model->name}}">
                            <label for="prize">Prize</label>
                            <input required type="text" name="prize" id="" value="{{$model->prize}}">
                            <label for="venue">Venue</label>
                            <select name="venue" id="">
                                @foreach ($venue as $item)
                                    <option value="{{ $item->id_Venue }}" {{ ( $model->venuename == $item->name) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            <label for="organizer">Organizer</label>
                            <select name="organizer" id="">
                                @foreach ($org as $item)
                                    <option value="{{ $item->id_Organizer }}" {{ ( $model->orgname == $item->name) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            <label for="timecontrol">Time Control</label>
                            <select name="timecontrol" id="">
                                @foreach ($tc as $item)
                                    <option value="{{ $item->id_Time_Control }}" {{ ( $model->tcname == $item->name) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            <input required type="hidden" name="id" value="{{ $model->id_Tournament }}">

                            <button type="submit"
                            style="width: 5.5vw;background-color:#28A745;height:2vw;border-radius:1vw;border:none;color:white">Save</button>
                        </form>
                      </div>
                  </div>
              </div>
              </tr>
            @endforeach
          </tbody>
      </table>


      <a href="/tourney/add" class="act-btn">
        +
      </a>
@endsection

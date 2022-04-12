@extends('template.main')
@section('content')
  <h1 class="title">Countries</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Surname</th>
              <th scope="col">ELO</th>
              <th scope="col">Title</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Gender</th>
              <th scope="col">Country</th>
              <th scope="col">Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $model)
              <tr>
                <td>{{ $model->id_player }}</td>
                <td>{{ $model->firstname }}</td>
                <td>{{ $model->surname}}</td>
                <td>{{ $model->elo}}</td>
                <td>{{ $model->title}}</td>
                <td>{{ $model->dateofbirth}}</td>
                <td>{{ $model->gender}}</td>
                <td>{{ $model->name}}</td>
                <td><button class="agree"><a href="#open-update{{ $i }}">edit</a></button></td>
                <td>
                  <form action="/player/remove/{{ $model->id_player }}" method="POST">
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
                          <h1>Edit the Player!</h1>
                          <form action="/player/update/{{$model->id_player}}" method="post">
                            @csrf
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" value="{{$model->firstname}}">
                            <label for="capital">Capital City</label>
                            <input type="text" name="capital" id="" value="{{$model->surname}}">
                            <input type="hidden" name="id" value="{{ $model->id_player }}">

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
      

      <a href="#open-modal" class="act-btn">
        +
      </a>
      
      <div id="open-modal" class="modal-window">
        <div class="outside">
            <div class="inside"">
                <a href="#" title="Close" class="modal-close" style="margin-bottom: 5vh">X</a>
                <h1>Create a Country!</h1>
                <form action="/country/insert/" method="post">
                  @csrf
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="">
                  <label for="capital">Capital City:</label>
                  <input type="text" name="capital" id="">
                  <button type="submit"
                  style="width: 5.5vw;background-color:#28A745;height:2vw;border-radius:1vw;border:none;color:white">Save</button>
              </form>
            </div>
        </div>
    </div>      
@endsection
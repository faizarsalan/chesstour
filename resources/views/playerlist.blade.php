@extends('template.main')
@section('content')
  <h1 class="title">Players</h1>
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
                            <label for="firstname">First Name</label>
                            <input required type="text" name="firstname" id="" value="{{$model->firstname}}">
                            <label for="surname">Surname</label>
                            <input required type="text" name="surname" id="" value="{{$model->surname}}">
                            <label for="elo">ELO Rating</label>
                            <input required type="text" name="elo" id="" value="{{$model->elo}}">
                            <label for="title">Title</label>
                            <input required type="text" name="title" id="" value="{{$model->title}}">
                            <label for="dateofbirth">Date of Birth</label>
                            <input required type="date" name="dateofbirth" id="" value="{{$model->dateofbirth}}">
                            <label for="gender">Gender</label>
                            <select name="gender" id="">
                                <option value="M" {{ ( $model->gender == 'M') ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ ( $model->gender == 'F') ? 'selected' : '' }}>Female</option>
                            </select>
                            <label for="country">Country</label>
                            <select name="country" id="">
                                @foreach ($country as $item)
                                    <option value="{{ $item->id_Country }}" {{ ( $model->name == $item->name) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            <input required type="hidden" name="id" value="{{ $model->id_player }}">

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
                <form action="/player/insert/" method="post">
                    @csrf
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="">
                    <label for="elo">ELO Rating</label>
                    <input type="text" name="elo" id="">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" name="dateofbirth" id="">
                    <label for="gender">Gender</label>
                    <select name="gender" id="">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <label for="country">Country</label>
                    <select name="country" id="">
                        @foreach ($country as $item)
                            <option value="{{ $item->id_Country }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>

                    <button type="submit"
                    style="width: 5.5vw;background-color:#28A745;height:2vw;border-radius:1vw;border:none;color:white">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('template.main')
@section('content')
  <h1 class="title">Countries</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Capital</th>
              <th scope="col">Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $country)
              <tr>
                <td>{{ $country->id_Country }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->capital}}</td>
                <td><button class="agree"><a href="#open-update{{ $i }}">edit</a></button></td>
                <td>
                  <form action="/country/remove/{{ $country->id_Country }}" method="POST">
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
                          <h1>Edit the Country!</h1>
                          <form action="/country/update/{{$country->id_Country}}" method="post">
                            @csrf
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" value="{{$country->name}}">
                            <label for="capital">Capital City</label>
                            <input type="text" name="capital" id="" value="{{$country->capital}}">
                            <input type="hidden" name="id" value="{{ $country->id_Country }}">

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


      <a href="/country/add" class="act-btn">
        +
      </a>
@endsection

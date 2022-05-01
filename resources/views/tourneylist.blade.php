@extends('template.main')
@section('content')
<h1 class="title">Venues</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Venue Name</th>
              <th scope="col">Country</th>
              <th>Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $model)
              <tr>
                <td>{{ $model->id_Venue }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->countryname }}</td>
                <td><button class="agree"><a href="/venue/edit/{{ $model->id_Venue }}">edit</a></button></td>
                <td>
                    <form action="/venue/remove/{{ $model->id_Venue }}" method="POST">
                    @csrf
                      <div>
                        <button class="remove" type="submit">remove</button>
                      </div>
                    </form>
                  </td>
              </tr>

            @endforeach
          </tbody>
      </table>


      <a href="/tourney/add" class="act-btn">
        +
      </a>
@endsection

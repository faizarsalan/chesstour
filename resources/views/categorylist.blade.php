@extends('template.main')
@section('content')
  <h1 class="title">Categories</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $model)
              <tr>
                <td>{{ $model->id_Category }}</td>
                <td>{{ $model->name }}</td>
                <td><button class="agree"><a href="#open-update{{ $i }}">edit</a></button></td>
                <td>
                  <form action="/category/remove/{{ $model->id_Category }}" method="POST">
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
                          <h1>Edit the Category!</h1>
                          <form action="/country/update/{{$model->id_Category}}" method="post">
                            @csrf
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" value="{{$model->name}}">
                            <input type="hidden" name="id" value="{{ $model->id_Category }}">

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
            <div class="multi-insert">
                <a href="#" title="Close" class="modal-close" style="margin-bottom: 5vh">X</a>
                <h1>Create a Category!</h1>
                <form action="/country/insert/" method="post">
                  @csrf
                  <div id="items">
                        <div id="row">
                        </div>

                        <a id="addRow">Add Row</a>
                  </div>

                  <div class="row">
                    <button class="submit-btn "type="submit">Save</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection

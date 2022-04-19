@extends('template.main')
@section('content')
<h1 class="title">Time Controls</h1>
        <table id="tablestyle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Time Control Name</th>
              <th scope="col">Inial Time</th>
              <th scope="col">Increment Time</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $model)
              <tr>
                <td>{{ $model->id_Time_Control }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->initialtime}}</td>
                <td>{{ $model->incrementtime}}</td>
                <td>{{ $model->categoryname}}</td>
                <td><button class="agree"><a href="#open-update{{ $i }}">edit</a></button></td>
                <td>
                  <form action="/time/remove/{{ $model->id_Time_Control }}" method="POST">
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
                          <h1>Edit the Time Control!</h1>
                          <form action="/time/update/{{$model->id_Time_Control}}" method="post">
                            @csrf
                            <label for="Name">Name</label>
                            <input required type="text" name="name" id="" value="{{$model->name}}">
                            <label for="initialtime">Initial Time</label>
                            <input required type="text" name="initialtime" id="" value="{{$model->initialtime}}">
                            <label for="incrementtime">Increment Time</label>
                            <input required type="text" name="incrementtime" id="" value="{{$model->incrementtime}}">
                            <label for="category">Category</label>
                            <select name="category" id="">
                                @foreach ($datacat as $item)
                                    <option value="{{ $item->id_Category }}" {{ ( $model->categoryname == $item->name) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            <input required type="hidden" name="id" value="{{ $model->id_Time_Control }}">

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


      <a href="/time/add" class="act-btn">
        +
      </a>
@endsection

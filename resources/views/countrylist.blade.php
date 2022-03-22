<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Capital</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $country)
            <tr>
              <td>{{ $country->id_Country }}</td>
              <td>{{ $country->name }}</td>
              <td>{{ $country->capital}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
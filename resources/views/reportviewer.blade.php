@extends('template.main')
@section('content')
    <h1 class="title">Tournaments in {{ $countryname }}</h1>
    <h1 class="title">There are {{ $number }} tournament(s)!</h1>
    <table id="tablestyle">
        <thead>
            <tr>
                <th scope="col">Venue ID</th>
                <th scope="col">Venue Name</th>
                <th scope="col">Country</th>
                <th scope="col">Tournament ID</th>
                <th scope="col">Tournament Name</th>
                <th scope="col">Prize</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venue as $item)
                <tr style="background: #f59e0b;">
                    <td> {{ $item->id_Venue }} </td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $countryname }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($data as $result)
                    @if ($result->venueid === $item->id_Venue)
                        <tr style="background: #ffbe4e;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $result->tourneyid }}</td>
                            <td>{{ $result->tourneyname }}</td>
                            <td>{{ $result->prize }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach

            <tr style="background: #f59e0b;">
                <td>Grand Total Prize</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $total }}</td>
            </tr>
            <tr style="background: #f59e0b;">
                <td>Rounded-Up Average Total Prize</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $rounduptotal }}</td>
            </tr>
        </tbody>
    </table>
@endsection

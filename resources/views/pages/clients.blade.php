@extends('layouts.app')

@section('content')

    @if(count($clients) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">voornaam</th>
                <th onclick="sortTable(1)">achternaam</th>
                <th onclick="sortTable(2)">telefoon nummer</th>
                <th onclick="sortTable(3)">email</th>
                <th colspan="2">Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($clients as $client)

                <tr>
                    <td>{{$client->client_firstname}}</td>
                    <td>{{$client->client_lastname}}</td>
                    <td>{{$client->client_phone}}</td>
                    <td>{{$client->client_email}}</td>
                    <td><a class="btn btn-info" href="clients/{{$client->client_id}}/edit">edit</a></td>

                    <td>{!! Form::open(['action' => ['ClientsController@destroy', $client->client_id], 'method' => 'POST',  'onsubmit' => 'return check()'])!!}
                        {{ Form::hidden('_method', 'DELETE')}}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close()!!}</td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else
        <p>nope, no clients</p>
    @endif

    <a href="clients/create" class="btn btn-success">create</a>
@endsection
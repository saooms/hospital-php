@extends('layouts.app')

@section('content')

    @if(count($patients) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Diersoort</th>
                <th onclick="sortTable(2)">Geslacht</th>
                <th onclick="sortTable(3)">Status</th>
                <th onclick="sortTable(4)">Client</th>
                <th colspan="2">Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($patients as $patient)

                <tr>
                    <td>{{$patient->patient_name}}</td>
                    <td>{{$patient->species_description}}</td>
                    <td>{{$patient->gender}}</td>
                    <td>{{$patient->patient_status}}</td>
                    <td>{{$patient->client_firstname}} {{$patient->client_lastname}}</td>
                    <td><a class="btn btn-info" href="patients/{{$patient->patient_id}}/edit">edit</a></td>
                    <td>{!! Form::open(['action' => ['PatientsController@destroy', $patient->patient_id], 'method' => 'POST',  'onsubmit' => 'return check()'])!!}
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

    <a href="patients/create" class="btn btn-success">create</a>
@endsection
@extends('layouts.app')

@section('content')

    @if(count($species) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">diersoort</th>
                <th colspan="2">Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($species as $specie)

                <tr>
                    <td>{{$specie->species_id}}</td>
                    <td>{{$specie->species_description}}</td>
                    <td><a class="btn btn-info" href="species/{{$specie->species_id}}/edit">edit</a></td>
                    <td>{!! Form::open(['action' => ['SpeciesController@destroy', $specie->species_id], 'method' => 'POST',  'onsubmit' => 'return check()'])!!}
                        {{ Form::hidden('_method', 'DELETE')}}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close()!!}</td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else
        <p>nope, no species</p>
    @endif

    <a href="species/create" class="btn btn-success">create</a>
@endsection
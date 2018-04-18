@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => ['SpeciesController@update', $data->species_id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('species', 'diersoort')}}
        {{ Form::text('species', $data->species_description, ['class' => 'form-control', 'placeholder' => 'diersoort'])}}
    </div>

    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/species" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
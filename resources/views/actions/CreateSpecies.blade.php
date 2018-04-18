@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => 'SpeciesController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('species', 'diersoort')}}
        {{ Form::text('species', '', ['class' => 'form-control', 'placeholder' => 'diersoort'])}}
    </div>

    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/species" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
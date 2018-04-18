@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => 'ClientsController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('Client', 'voornaam client')}}
        {{ Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'voornaam'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'achternaam client')}}
        {{ Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'achternaam'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'telefoon nummer')}}
        {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'telefoon nummer'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'emailadres')}}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
    </div>

    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/clients" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => ['ClientsController@update', $data->client_id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('Client', 'voornaam client')}}
        {{ Form::text('firstname', $data->client_firstname, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'achternaam client')}}
        {{ Form::text('lastname', $data->client_lastname, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'telefoon nummer')}}
        {{ Form::text('phone', $data->client_phone, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('Client', 'emailadres')}}
        {{ Form::text('email', $data->client_email, ['class' => 'form-control'])}}
    </div>
    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/clients" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
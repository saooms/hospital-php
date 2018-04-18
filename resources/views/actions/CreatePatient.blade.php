@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => 'PatientsController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('name_Patient', 'Patient naam:')}}
        {{ Form::text('name_Patient', '', ['class' => 'form-control', 'placeholder' => 'naam'])}}
    </div>

    <div class="form-group">
        {{ Form::label('species', 'Diersoort:')}}
        {{ Form::select('species', $PatientsData[0], null, ['placeholder' => 'Kies diersoort...', 'class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('gender', 'Patient geslacht:')}}<br>
        {{ Form::label('mannelijk')}}    {{form::radio('gender', 'mannelijk')}}<br>
        {{ Form::label('vrouwelijk')}}    {{form::radio('gender', 'vrouwelijk')}}
    </div>

    <div class="form-group">
            {{ Form::label('name_Client', 'Client naam:')}}
            {{Form::select('name_Client', $PatientsData[1], null, ['class' => 'form-control', 'placeholder' => 'Kies client naam...'])}}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Patient status')}}
        {{ Form::textarea('status', '', ['class' => 'form-control', 'placeholder' => 'Status van de Patient'])}}
    </div>

    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/patients" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
@extends('layouts.app')

@section('content')
    
{!! Form::open(['action' => ['PatientsController@update', $PatientsData[2]->patient_id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('name_Patient', 'Patient naam:')}}
        {{ Form::text('name_Patient', $PatientsData[2]->patient_name, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('species', 'Diersoort:')}}
        {{ Form::select('species', $PatientsData[0], $PatientsData[2]->species_id, ['class' => 'form-control'])}}
    </div>

    @if($PatientsData[2]->gender == 'mannelijk')
        <div class="form-group">
            {{ Form::label('gender', 'Patient geslacht:')}}<br>
            {{ Form::label('mannelijk')}}    {{form::radio('gender', 'mannelijk', true)}}<br>
            {{ Form::label('vrouwelijk')}}    {{form::radio('gender', 'vrouwelijk')}}
        </div>
        @else
            {{ Form::label('gender', 'Patient geslacht:')}}<br>
            {{ Form::label('mannelijk')}}    {{form::radio('gender', 'mannelijk')}}<br>
            {{ Form::label('vrouwelijk')}}    {{form::radio('gender', 'vrouwelijk', true)}}
    @endif

    <div class="form-group">
            {{ Form::label('name_Client', 'Client naam:')}}
            {{Form::select('name_Client', $PatientsData[1], $PatientsData[2]->client_id, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Patient status')}}
        {{ Form::textarea('status', $PatientsData[2]->patient_status, ['class' => 'form-control'])}}
    </div>

    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::submit('submit', ['class' => 'btn btn-primary'])}}
    <a href="/hospital/patients" class="btn btn-danger">cancel</a>
{!! Form::close() !!}

@endsection
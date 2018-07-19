@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{ HTML::ul($errors->all()) }}

{{ Form::model($employee, ['route' => ['employee.update', $employee->id], 'method' => 'PUT', 'files' => true]) }}

<div class="form-group">
        {{ Form::label('firstname', 'Firstname') }}
        {{ Form::text('firstname', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
            {{ Form::label('lastname', 'Lastname') }}
            {{ Form::text('lastname', null, array('class' => 'form-control')) }}
        </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('company', 'Company') }}
        {{ Form::select('company', $companies, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone Number') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit Employee!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>

@endsection

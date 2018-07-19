@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Create Employee</h3>
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['route' => ['employee.store'], 'method' => 'POST']) }}

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

            {{ Form::submit('Create Employee!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
</div>

@endsection

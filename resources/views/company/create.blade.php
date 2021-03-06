@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Create Company</h3>
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['route' => ['company.store'], 'method' => 'POST', 'files' => true]) }}

            <div class="form-group">
                {{ Form::label('name', 'Company Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Company Email') }}
                {{ Form::email('email', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('logo', 'Company Logo') }}
                {{ Form::file('logo') }}
            </div>

            <div class="form-group">
                {{ Form::label('website', 'Company Website') }}
                {{ Form::text('website', null, array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Create Company!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
</div>

@endsection

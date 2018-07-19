@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="employee">

<h3>Firstname: {{$employee->firstname}}</h3>
<h3>Lastname: {{$employee->lastname}}</h3>
<h3>Email: {{$employee->email}}</h3>
<h3>Phone number: {{$employee->phone}}</h3>
</div>
<hr>
<h2>Company</h2>
<h3>{{$employee->firstname}} is an employee of {{$employee->company()->first()->name}}</h3>

<hr>
<a href='/employee/edit/{{$employee->id}}' class="btn btn-primary float-left">Edit</a>
                {{ Form::open(['route' => ['employee.delete', $employee->id], 'method' => 'delete']) }}
                {{ Form::submit('Delete!', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
</div>
@endsection

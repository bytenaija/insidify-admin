@extends('layouts.app')

@section('content')
<div class="container-fluid">
<header class="header">
    <div class="float-left">
    <h3>List of Employees</h3>
</div>

<div class="float-right">
<a href="{{route('employee.create')}}" class="btn btn-primary">Create New Employee</a>
    </div>
</header>
<div class="body">
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th >First Name</th>
                <th >Last Name</th>
                <th >Email Address</th>
                <th >Phone</th>
                <th >Company Name</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)

        <tr class="clickable-row" data-href="{{route('employee.show', $employee->id)}}">
            <td>{{$employee->firstname}}</td>
            <td>{{$employee->lastname}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td>{{$employee->company()->first()->name}}</td>
            <td><a href='/employee/edit/{{$employee->id}}' class="btn btn-primary">Edit</a>
                {{ Form::open(['route' => ['employee.delete', $employee->id], 'method' => 'delete']) }}
                {{ Form::submit('Delete!', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </tr>
           @empty
           <tr><td colspan="5"> No Employee has been entered yet</td></tr>
           @endforelse
        </tbody>
    </table>

    {{$employees->links()}}
</div>
</div>

@endsection

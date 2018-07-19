@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="company">
<img class="image-responsive" src="{{asset('/storage/'.$company->logo)}}">
<h2>{{$company->name}}</h2>
<h3>{{$company->email}}</h3>
<h3>{{$company->website}}</h3>
</div>
<hr>
<h3>Employees of {{$company->name}}</h3>
<table class="table table-responsive table-dark">
    <thead>
        <th scope="col" style="width:25%;">First Name</th>
        <th scope="col" style="width:25%;">Last Name</th>
        <th scope="col" style="width:25%;">Email</th>
        <th scope="col" style="width:25%;">Phone</th>
    </thead>
    <tbody>
        @forelse($company->employees as $employee)
        <tr scope="row">
            <td>
                {{$employee->firstname}}
            </td>

            <td>
                    {{$employee->lastname}}
            </td>

            <td>
                    {{$employee->email}}
            </td>

            <td>
                    {{$employee->phone}}
                </td>
        </tr>
        @empty
    <tr><td colspan="4">No employee entered yet. <a href="{{route('employee.create')}}" class="btn btn-success">Create Employee</a></td></tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
<header class="header">
    <div class="float-left">
    <h3>List of Companies</h3>
</div>

<div class="float-right">
<a href="{{route('company.create')}}" class="btn btn-primary">Create New Company</a>
    </div>
</header>
<div class="body">
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th style="width: 10%;">Logo</th>
                <th style="width: 20%;">Company Name</th>
                <th style="width: 30%;">Email Address</th>
                <th style="width: 20%;">Website</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
        <tr class="clickable-row" data-href="{{route('company.show', $company->id)}}">
            <td class="image"><img src="{{asset('/storage/'.$company->logo)}}" class="img-responsive"/></td>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td><a href='/company/edit/{{$company->id}}' class="btn btn-primary">Edit</a>
                {{ Form::open(['route' => ['company.delete', $company->id], 'method' => 'delete']) }}
                {{ Form::submit('Delete!', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </tr>
           @empty
           <tr><td colspan="4"> No Company has been entered yet</td></tr>
           @endforelse
        </tbody>
    </table>

    {{$companies->links()}}
</div>
</div>

@endsection

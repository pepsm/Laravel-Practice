@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card panel-wrapper">
                <div class="card-body">
                    <p>List of all <strong>users</strong></p>
                    <ul class="list-group">
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>{{$user->id}}</div>
                                <div>{{$user->name}}</div>
                                <div>{{$user->email}}</div>
                                <div>{{$user->created_at}}</div>
                                <div>
                                    {!!Form::open(['action' => ['AdminController@destroyUser', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm'])}}
                                    {!!Form::close()!!}
                                </div>
                            </li>
                        @endforeach
                    @else
                        <p> No users found <p>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

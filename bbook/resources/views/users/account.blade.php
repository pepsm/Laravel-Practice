@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <h1>Account</h1>
        <hr>
        {!! Form::open(array('action' => array('AccountsController@update', $user->id), 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
        @csrf
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <img style="width:70%" src="/storage/cover_images/{{$user->profile_image}}" width="140px" height="140px" class="rounded-circle" alt="avatar"> <br><br>
                <h6>Upload a different photo ... </h6>
                <div class="text-center">
                    {{Form::file('cover_image')}}
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <h3>Personal info</h3>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            {{Form::label('name', 'Full Name:')}}
                        </label>
                        <div class="col-lg-8">
                            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            {{Form::label('email', 'Email address:')}}
                        </label>
                        <div class="col-lg-8">
                            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            {{Form::label('password', 'Password :')}}
                        </label>
                        <div class="col-lg-8">
                            {{Form::password('password', ['class' => 'form-control ', 'placeholder' => 'Password'])}}
                        </div>
                    </div>

                    <label class="col-md-3 control-label"></label>
                    <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-8">
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                                </div>
                            </div>

                        {!! Form::close() !!}
                            <div class="col-md-2">

                                {!!Form::open(['action' => ['AccountsController@destroy', $user->id], 'method' => 'POST', 'class' => 'form-horizontal'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </form>

            </div>
                </div>

            </div>
        @endsection

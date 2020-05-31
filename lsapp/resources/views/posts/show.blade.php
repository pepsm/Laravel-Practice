@extends('layouts.app')

@section('content')
        <a href="/posts" class="btn btn-outline-dark">Go Back</a>
        <br>
        <h3>{{$post->title}}</h3>
        <div>
            {{$post->body}}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <br>
        <div>
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>
            <br>

            {!!Form::open(['action'=>['PostController@destroy', $post->id], 'method' => 'POST', 'class'=>'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
@endsection

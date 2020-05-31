@extends('layouts.app')

@section('content')
        <a href="/posts" class="btn btn-outline-dark">Go Back</a>
        <br><br>
        <h3>{{$post->title}}</h3>
        <div>
            {{$post->body}}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <br><br>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
        <div class="d-flex flex-row">
            <div class="w-75">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>
            </div>
            <div class="w-25">
                {!!Form::open(['action'=>['PostController@destroy', $post->id], 'method' => 'POST', 'class'=>'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            </div>
        </div>
                @endif
        @endif
@endsection

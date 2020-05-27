@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Post</h1>
    </div>

    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => "POST"]) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Add Title'] )}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body',$post->body,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Write something'] )}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' =>'btn btn-primary' ])}}
    {!! Form::close() !!}
@endsection

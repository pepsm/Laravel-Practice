@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Post</h1>
    </div>

    {!! Form::open(['action' => 'PostController@store', 'method' => "POST"]) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Add Title'] )}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Write something'] )}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary' ])}}
    {!! Form::close() !!}
@endsection

@extends('layouts.app')

@section('content')

    <h1 class="mt-5">Create Post</h1>
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

        {{Form::submit('Create', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}


@endsection
@extends('layouts.app')

@section('content')
    

    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $item->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $item->description, ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
        </div>

        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    
@endsection

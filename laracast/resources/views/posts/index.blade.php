@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        <ul class="table-striped">
        @foreach($posts as $post)
            <div class="list-group">
                <li class="list-group-item" >
                    {{$post->title}}
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-danger ml-5 pl-2 pr-2 pb-0 pt-0">Edit</a>
                </li>
                <li class="list-group-item list-group-item-light">
                    {{$post->body}}
                   </li>
            </div></br>
        @endforeach
        </ul>
    @endif
@endsection

@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Posts</h1>
        <hr>

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well well-lg">
                <h5><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                <small>Written on {{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
    </div>
@endsection

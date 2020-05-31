@extends('layouts.app')

@section('content')

    <h1>Posts</h1>
        <hr>

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well well-lg">
                <div class="row">
                    <div class="col-md-4 col-ms-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-8 col-ms-8">
                        <h5><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection

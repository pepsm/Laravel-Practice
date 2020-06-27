@extends('layouts.app')

@section('content')
<div class="wrapper">

    <h3>Popular Posts</h3>
    <div class="headers-divider"></div>

    <div class="post-area">
    @if (count($items) > 0)
        @foreach ($items as $item)

                <div class="post-item">
                    <div class="img-container">
                        <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}"/>
                        <a href="{{ url('/items/'.$item->id) }}"><div class="cover"><h6>{{$item->title}}</h6></div></a>
                    </div>
                    <div class="additional">
                        <div>
                            Written on <b>{{$item->created_at}}</b> by <b>{{$item->user->name}}</b>
                        </div>
                        <div class="likes">
                            {{ $item->likes()->count() }}<a class="text-decoration-none" href="{{ route('item.like', $item->id) }}"> <i class="fa fa-thumbs-up"></i> </a>
                        </div>
                    </div>
                </div>

        @endforeach
        {{$items->links()}}
    </div>
    @else
        <p> No posts found <p>
    @endif
</div>
@endsection

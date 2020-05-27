@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>{{$title}}</h1>
    <p>This is a random paragraph and our service page</p>

    @if(count($services) > 0)
        <ul class="list-group">
        @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
    </div>
@endsection

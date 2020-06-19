@extends('layouts.app')

@section('content')
    <div class="welcome-container">
        <div class="highlight"># Find your book here </div>
        <div class="header">
            <h1>Welcome to {{config('app.name', 'Laravel')}} the place you will love</h1>
            <h4>All popular books reviews with one click.</h4>
        </div>
        <div class="btn-container">
            <a class="btn btn-highlight" href="{{ url('/items') }}">See Latest</a>
        </div>

    </div>



@endsection

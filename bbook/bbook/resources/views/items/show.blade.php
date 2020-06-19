@extends('layouts.app')

@section('content')
    <div class="container my-3">

        <a class="btn btn-outline-dark btn-sm my-3" href="{{ url('/items')}}" class="btn btn-link">Go Back</a>
         <div class="container">
             <div class="d-flex justify-content-center">
                 <img class="item-show-img" src="/storage/cover_images/{{$item->cover_image}}" />
             </div>
             <div class="d-flex justify-content-end align-content-center likes">
                <span>{{ $item->likes()->count() }}</span> <a class="text-decoration-none ml-2" href="{{ route('item.like', $item->id) }}">  <i class="fa fa-thumbs-up"></i> </a>
             </div>

             <div class="container mt-2">
                 <h1 class="">{{$item->title}}</h1>
                 {!! $item->description !!}
             </div>

             <hr class="mt-5">
             <div class="d-flex  justify-content-between">
                <div class="w-25">
                    <small><i class="far fa-calendar-alt"></i>  Date: {{$item->created_at}}</small>
                </div>
                <div class="w-25 text-md-right">
                    <small><i class="fas fa-user-edit"></i> Author: {{$item->user->name}}</small>
                </div>
             </div>

             <div class="my-3">
             @if (!Auth::guest())
                 @if (Auth::user()->id == $item->user_id)

                     <a class="btn btn-outline-dark float-left btn-sm" href="{{ url('items/'.$item->id.'/edit')}}">Edit</a>

                     {!!Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm'])}}
                     {!!Form::close()!!}

                 @endif
             @endif
             </div>

             <div class="container mt-5">
             @yield('comments-content')


                 <h6>Share with friend</h6>
                 {!!Form::open(['action' => ['CommentController@store', $item->id], 'method' => 'POST', 'class' => 'float-center'])!!}

                 @csrf
                 <div class="form-group">
                     {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Description text'])}}
                     {{ Form::hidden('item_id', $item->id) }}
                 </div>

                 {{Form::submit('Add Comment', ['class' => 'btn btn-outline-success btn-sm'])}}
                 {!!Form::close()!!}
             </div>
         </div>
     </div>


@endsection

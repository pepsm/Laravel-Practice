@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card panel-wrapper">

                <div class="card-body">
                    <p>List of all <strong>posts</strong></p>
                    <ul class="list-group">
                        @if (count($items) > 0)
                            @foreach ($items as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{$item->id}}</div>
                                    <div>{{$item->title}}</div>
                                    <div>{{$item->created_at}}</div>
                                    <div>
                                        {!!Form::open(['action' => ['AdminController@destroyItem', $item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p> No posts found <p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

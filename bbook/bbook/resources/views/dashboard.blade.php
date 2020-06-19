@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>Your {{ config('app.name', 'Laravel') }} Posts</h1>

                    <a href="{{ url('/items/create') }}" class="btn btn-outline-success float-left my-3">Create new item</a>
                    
                    @if (count($items) > 0)
                        
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $index=>$item)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$item->title}}</td>
                                        <td><a href="{{url('/items/'.$item->id.'/edit')}}" class="btn btn-outline-dark btn-sm float-right">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

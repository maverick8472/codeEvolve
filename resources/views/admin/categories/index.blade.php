@extends('layouts.admin')



@section('content')


    <h1>Categories</h1>

    {{--<div class="col-sm-6">--}}

    {{--{!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}--}}

    {{--<div class="form-group">--}}
    {{--{!! Form::label('name', 'Name:') !!}--}}
    {{--{!! Form::text('name', null, ['class'=>'form-control'])!!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}--}}
    {{--</div>--}}

    {{--{!! Form::close() !!}--}}

    {{--</div>--}}

    <div class="class col-sm-6">
        @if($categories)
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><img height="50" width="100" src="{{$category->photo ? $category->photo->file : '/images/category_header_placeholder.jpg'}}" alt=""></td>
                        <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans(): 'Unknown'}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @endif

    </div>


@stop
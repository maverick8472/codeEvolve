@extends('layouts.admin')



@section('content')


    <h1>Categories</h1>


    <div class="row">

        <div class="col-sm-4">

            <img src="{{$category->photo->file}}" alt="" class="img-responsive">

        </div>

        <div class="col-sm-6">

            {!! Form::model($category,['method'=>'PATCH', 'action'=> ['Admin\CategoriesController@update',$category->id],'files'=>true])!!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'Admin\CategoriesController@destroy',$category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete category',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

        </div>


    </div>





@stop
@extends('layouts.admin')



@section('content')


    <h1>Create Category</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'Admin\CategoriesController@store','files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop
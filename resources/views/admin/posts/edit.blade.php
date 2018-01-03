@extends('layouts.admin')




@section('content')


    <h1>Edit Post</h1>





    <div class="row">

        <div class="col-sm-4">

            <img src="{{$post->photo ? $post->photo->file : '/images/post_placeholder.jpg'}}" alt="" class="img-responsive">
{{--            <img src="{{$users->photo ? $users->photo->file : '/images/profile_placeholder_400x400.jpg'}}" alt="" class="img-responsive img-rounded">--}}


        </div>

        <div class="col-sm-6">

            {!! Form::model($post,['method'=>'PATCH', 'action'=> ['Admin\PostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {{--{!! Form::select('category_id', [''=> 'Choose category'] + $categories,null,['class'=>'form-control'])!!}--}}
                {{--{!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}--}}
                {!! Form::select('category_id',$categories,null,['class'=>'form-control'])!!}


            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\PostsController@destroy', $post->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>





    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@stop
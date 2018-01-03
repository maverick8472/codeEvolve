@extends('layouts.admin')




@section('content')


    <h1>Media</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            {{--<th>Name</th>--}}
            <th>Photo</th>
            <th>Owner</th>
            <th>Created</th>


        </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->user->name}}</td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans(): 'Unknown'}}</td>


                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\MediasController@destroy',$photo->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@stop
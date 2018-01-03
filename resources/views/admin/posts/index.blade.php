@extends('layouts.admin')




@section('content')


    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            {{--<th>Post</th>--}}
            {{--<th>Comments</th>--}}
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    {{--<td>{{$post->photo_id}}</td>--}}
                    <td><img height="50" width="100" src="{{$post->photo ? $post->photo->file : '/images/post_placeholder.jpg'}}" alt=""></td>
                    {{--<td><a href="{{route('posts.edit',$post->id)}}">{{$post->users->name}}</a></td>--}}
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->body, 0, 10)}}</td>
                    {{--<td><a href="{{route('home.post',$post->id)}}">View </a></td>--}}
                    {{--<td><a href="{{route('comments.show',$post->id)}}">View </a></td>--}}
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}"> <i class="glyphicon glyphicon-edit "></i> Edit</a>
                        <a href="{{route('home.post',$post->id)}}"> <i class="glyphicon glyphicon-eye-open"></i> View</a>
{{--                        <a href="{{route('comments.show',$post->id)}}"> <i class="glyphicon glyphicon-comment"></i> Comments</a>--}}
                        <a href="{{route('comments.index')}}"> <i class="glyphicon glyphicon-comment"></i> Comments</a>
                        <a href="{{route('delete_post_path',$post->id)}}"><i class="glyphicon glyphicon-trash"></i> Delete</a>


                    </td>
                </tr>
        </tbody>

        @endforeach

        @endif
    </table>



@stop
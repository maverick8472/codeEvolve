


@extends('layouts.admin')




@section('content')

@include('includes.messages')

    @if(Session::has('deleted_user'))

        <p>{{session('deleted_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    {{--<td>{{$users->photo ? $users->photo->file : 'no users photo'}}</td>--}}
                    {{--<td><img height="50" src="/images/{{$users->photo ? $users->photo->file : 'no users photo'}}" alt=""></td>--}}
                    <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file : '/images/profile_placeholder.jpg'}}" alt=""></td>
                    {{--<td><a href="{{route('users.edit',$users->id)}}">{{$users->name}}</a></td>--}}
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                    {{--<td>{{$users->is_acctive}}</td>--}}
                    <td>{{$user->is_active == 1 ?  'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                        {{--<a href="#"><i class="glyphicon glyphicon-trash"></i>Delete</a>--}}
                        <a href="{{route('delete_user_path',$user->id)}}"><i class="glyphicon glyphicon-trash"></i>Delete</a>




                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>



@stop
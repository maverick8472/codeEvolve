@extends('layouts.blog-post')



@section('content')

    <!-- Blog Post -->

    <!-- Title -->


    <!-- Author -->
    <p class="lead">
        {{--by <a href="#">{{$post->users->name}}</a> / Posted {{$post->created_at->diffForHumans()}}--}}

    <p style="padding:10px;">
    @if($next)
            <a class="left" href="{{route('home.post',$next)}}" style="float:right;">NEXT <span style="font-size:20px;">&#xbb;</span></a>

    @endif
    @if($previous)

        <a class="left" href="{{route('home.post',$previous)}}" style="float:left;"><span style="font-size:20px;">&#xab;</span> PREV</a>


            @endif
    </p>


    {{--<p style="padding:10px;">--}}
    {{--<a class="left" href="" style="float:left;">--}}
        {{--<span style="font-size:20px;">&#xab;</span> PREV</a>--}}

    {{--<a class="right" href="" style="float:right;">--}}
        {{--NEXT <span style="font-size:20px;">&#xbb;</span></a>--}}
    {{--</p>--}}
    <hr>

    <!-- Date/Time -->
    {{--<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>--}}


    <!-- Preview Image -->
    {{--<img class="img-responsive" width="900" height="300" src="{{$post->photo->file}}" alt="">--}}
    <img class="img-responsive" width="900" height="300" src="{{$post->photo ? $post->photo->file : 'post_placeholder.jpg'}}" alt="">



    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->


    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

         {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}

             <input type="hidden" name="post_id" value="{{$post->id}}">

             <div class="form-group">
                 {!! Form::label('title', 'Title:') !!}
                 {!! Form::textarea('body', null, ['class'=>'form-control','rows' => 3])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
             </div>

         {!! Form::close() !!}
    </div>

    @endif

    <hr>

    <!-- Posted Comments -->


    @if(count($comments) > 0)

        @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" width="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
{{--                <small>{{ date('F d, Y', strtotime($comment->created_at)) }} </small>--}}

            </h4>
                <p>{{$comment->body}}</p>

        @if(count($comment->replies) > 0)
{{--        @if($comment->replies > 0 || $comment->replies == 0)--}}



            @foreach($comment->replies as $reply)

                @if($reply->is_active == 1)





                <!-- Nested Comment -->

                    <div id="nested-comment" class="media">
                        <a class="pull-left" href="#">
                            <img height="64" width="64" class="media-object" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            <p>{{$reply->body}}</p>


                        </div>


                        {{--<div class="comment-reply-container">--}}


                            {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}


                            {{--<div class="comment-reply col-sm-6">--}}


                                {{--{!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}--}}
                                {{--<div class="form-group">--}}

                                    {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}

                                    {{--{!! Form::label('body', 'Body:') !!}--}}
                                    {{--{!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}


                            {{--</div>--}}

                        {{--</div>--}}
                </div>

                    <!-- End Nested Comment -->

                    @else

                        {{--<h1 class="text-center">No Replies</h1>--}}



                @endif

            @endforeach
        @endif


            <div class="comment-reply-container">


                {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}


                <div class="comment-reply col-sm-6">


                    {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                    <div class="form-group">

                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                        {!! Form::label('body', 'Write Replay:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}


                </div>

            </div>

        </div>
    </div>
        @endforeach
    @endif

    @stop

@section('scripts')

    <script>
        $(".comment-replay-container.toggle-replay").click(function () {
            $(this).next().slideToggle("slow");
        })
    </script>
@stop
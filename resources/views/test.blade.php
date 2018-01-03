


<div class="clearfix"></div>
<div class="row">

    {{--@if($next)--}}

        {{--<p>{{$next->title}}</p>--}}

        {{--<a href="{{ URL::to( 'blog/' . $next->id ) }}">Next</a>--}}

    {{--@elseif($previous)--}}

        {{--<p>{{$previous->title}}</p>--}}
        {{--<a href="{{ URL::to( 'blog/' . $previous->id ) }}">Previous</a>--}}


    {{--@endif--}}

        @if($next)

            <p>{{$next->title}}</p>

            <a href="{{ URL::to( 'blog/' . $next->id ) }}">Next</a>


    @endif
        @if($previous)

            <p>{{$previous->title}}</p>
            <a href="{{ URL::to( 'blog/' . $previous->id ) }}">Previous</a>

            @endif


</div>
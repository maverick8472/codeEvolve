<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Code Evolve </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    body {
        padding-top: 0px;
    }
    header{    height: 400px;
        position: relative;}
    .lead {
        margin: 20px 0;
    }
    header{ height:400px;position:relative;}
    header:after{content:"";display:inline-block;width:100%;
        height: 100%;
        background-image: -webkit-linear-gradient(top,transparent,rgba(0,0,0,.7));
        background-image: linear-gradient(to bottom,transparent,rgba(0,0,0,.7));
        -webkit-transition: background-image 1s cubic-bezier(.25,.46,.45,.94);
        transition: background-image 1s cubic-bezier(.25,.46,.45,.94);}
    header:after{    position: absolute;
        bottom: 0;
        left: 0;
        display: block;
        width: 0;
        height: 0;
        border-color: transparent transparent transparent #fff;
        border-style: solid;
        content: "";
        border-width: 80px 0 0 75px;}
    header h1{     position: absolute;
        left: 100px;
        bottom: 120px;
        color: #fff;
        font-size: 16px;}
    .article-card-taxonomy {
        position: relative;
        display: inline-block;

        line-height: 1;
        background-color: #e22524;
        padding: 0;
        margin: 0;
    }
    .article-card-taxonomy::after, .article-card-taxonomy::before {
        position: absolute;
        top: 50%;
        display: block;
        width: 10px;
        height: 100px;
        margin-top: -50px;
        background-color: #e22524;
        content: "";
    }
    .article-card-taxonomy-container {
        position: absolute;
        bottom: 150px;
        left: 100px;
        display: block;
        padding: 0 8px;
        margin-top: -15px;
        margin-bottom: 17px;
        overflow: hidden;
    }
    .article-card-taxonomy a {
        position: relative;
        display: inline-block;
        z-index: 100;
        line-height: 30px;
        color: #fff;
        padding: 0;
        margin: 0;
        text-decoration: none;
        padding-left: 14px;
        padding-right: 14px;
        font-size:25px;
    }
    .article-card-taxonomy::after {
        right: -5px;
        -webkit-transform: rotate(10deg);
        -ms-transform: rotate(10deg);
        transform: rotate(10deg);
    }
    .article-card-taxonomy::before {
        left: -5px;
        -webkit-transform: rotate(10deg);
        -ms-transform: rotate(10deg);
        transform: rotate(10deg);
    }
    #aside{    position: absolute;
        top: -50px;
        background: #fff;
        width: 350px;
        right: 150px;
        border-radius: 0;
        padding: 0 19px 10px 19px;
    }
    #aside::before {
        display: block;
    }
    #aside::before {
        position: absolute;
        top: -30px;
        left: 0;

        width: calc(100% - 30px);
        height: 30px;
        background-color: #fff;
        content: "";
    }
    #aside::after {
        display: block;
    }
    #aside::after {
        top: -30px;
        right: 0;
        bottom: auto;
        display: none;
        border-width: 30px 0 0 30px;
    }
    #aside::after {
        position: absolute;

        bottom: 0;
        display: block;
        width: 0;
        height: 0;
        border-color: transparent transparent transparent #fff;
        border-style: solid;

        content: "";
    }
    h4 span{font-size: 16px;
        font-weight: 100;
        position: absolute;}
</style>
</head>

<body>

<!-- Navigation -->
{{--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">--}}
    {{--<div class="container">--}}
        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="#">Start Bootstrap</a>--}}
        {{--</div>--}}
        {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li>--}}
                    {{--<a href="#">About</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Services</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Contact</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- /.navbar-collapse -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</nav>--}}
<header style="background:url('{{$post->photo ? $post->photo->file : 'post_placeholder.jpg'}}') 100%;background-position:center;background-size:cover;">
    <span class="article-card-taxonomy-container">
    <p class="article-card-taxonomy">
        <a href="#" class="smart home" sl-processed="1">
            {{$post->title}}
        </a>
    </p>
    </span>
    {{--<h1>Code Evolve | {{$category->name}}</h1>--}}
    <h1>
        {{--JavaScript® (often shortened to JS) is a lightweight, interpreted,<br>--}}
        {{--object-oriented language with first-class functions.--}}
        by <a href="#">{{$post->user->name}}</a> / Posted {{$post->created_at->diffForHumans()}}

    </h1>
</header>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

           @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4" style="position:absolute;" >

            <div class="well" id="aside">
                {{--<h4>Author name</h4>--}}
                <h4
                    style="font-size: 22px;font-weight:900;position:absolute;top:0px;left:80px;">{{$user->name}}
<span>
                    @if($postsCount == 1)
                        {{$postsCount}} article
                    @else
                        {{$postsCount}} articles
                    @endif
</span>
                </h4>
                <p style="font-weight: 900;">
                </p>
                <p><img height="50" width="50" src="{{$user->photo ? $user->photo->file : '/images/profile_placeholder.jpg'}}" alt=""></p>
                <p>{{$user->about}}</p>

                {{--<img style="width:200px;height:50px;border-radius:50%;background:#333;" id="profile_img" src="" alt="profile" />--}}
            </div>

            <!-- Blog Categories Well -->
            <div class="well" style="margin:170px 0;">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">

                            @foreach($categories as $category)

{{--                                <li><a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a></li>--}}
                                <li><a href="{{route('category',$category->id)}}">{{$category->name}}</a></li>

                            @endforeach

                        </ul>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- Side Widget Well -->


        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Code Evolve 2017</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

@yield('scripts')



</body>

</html>

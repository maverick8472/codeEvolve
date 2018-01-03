<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>

    @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);@charset "UTF-8";
  html,body{ padding:0;margin:0;font-family: 'Raleway', sans-serif;color:#333;}
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
      bottom: 100px;
      color: #fff;
      font-size: 16px;}
  ul{    list-style-type: none;
      padding: 100px;
      margin: 0;}
    li{    width: 33.333%;
        float: left;    padding: 20px;}
    li figure div{    width: 100%;
        height: 200px;
        background-position: center;}
    li figure{padding: 0;
    margin: 0;position:relative;}

    li figure span{    position: absolute;
        background: #333;
        color: #fff;
        padding: 5px 10px;
        bottom: 0;}
    li a{text-decoration:none;text-transform: lowercase;
        font-size: 13px;}
    i{vertical-align:middle;}
    li h1{padding: 10px;
        background: #e22524;
        color: #fff;
        margin: 0;
        font-weight: 100;}
    li p{text-align: justify;}
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
    header:before{ content:'';display:inline-block;width:100vw; height:100%;  background-image: -webkit-linear-gradient(top,transparent,rgba(0,0,0,.7));
        background-image: linear-gradient(to bottom,transparent,rgba(0,0,0,.7));
        -webkit-transition: background-image 1s cubic-bezier(.25,.46,.45,.94);
        transition: background-image 1s cubic-bezier(.25,.46,.45,.94);}
</style>
<header style="background:url('{{$category->photo ? $category->photo->file : 'category_header_placeholder.jpg'}}') 100%;background-position:center;background-size:cover;">
    <span class="article-card-taxonomy-container">
    <p class="article-card-taxonomy">
        <a href="#" class="smart home" sl-processed="1">
            {{$category->name}}                    </a>
    </p>
    </span>
    {{--<h1>Code Evolve | {{$category->name}}</h1>--}}
    <h1>
        JavaScript® (often shortened to JS) is a lightweight, interpreted,<br>
        object-oriented language with first-class functions.
    </h1>
</header>

<ul>
    @foreach($posts as $post)
    <li>
        <figure><span><i class="material-icons">person</i> {{$post->user->name}}</span><div class="li_img" style="background:url('{{$post->photo->file}}') 100%"></div></figure>
        <h1>{{$post->title}}</h1>
        {{--trin na 150 znakova --}}
        <p>{{$post->body}} ...</p>
        <a href="{{route('home.post',$post->id)}}}}"><i class="material-icons">link</i> Link</a>
    </li>
    @endforeach
    </ul>
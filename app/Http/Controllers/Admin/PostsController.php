<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $user = Auth::user();


//        return $request->file();




        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);


            $photo = Photo::create(['file'=>$name,'user_id' => $user->id]);


            $input['photo_id'] = $photo->id;


        }else{

            $photo = url('/images/post_placeholder.jpg');

            $name = basename($photo);

            $photo = Photo::create(['file'=>$name,'user_id'=> $user->id]);

            $input['photo_id'] = $photo->id;
        }



        $user->posts()->create($input);


        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);



            $photo = Photo::create(['file'=>$name,'user_id' => $user->id]);

            $input['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

//        Post::update($input);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

        $post->delete();

//        Session::flash('deleted_post','The post has been deleted');

        return redirect('admin/posts');
    }

    public function post($id){


        $post = Post::findOrFail($id);
        $user_id = $post->user_id;
        $user = User::findOrFail($user_id);

//        $postsCount = Post::where('user_id', $user->id)->count;

//        $postsCount = auth()->user()->posts()->count();

//        $postsCount = Post::where('user_id', auth()->user()->id)->count;

        $postsCount = $user->posts()->count();


//        $postComments = Comment::where('user_id', $user)->count;

        $comments = $post->comments()->whereIsActive(1)->get();

        $categories = Category::all();

        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        $next = Post::where('id', '>', $post->id)->first();

//        foreach($comments as $comment){
//            foreach ($comment->replies as $reply){
//
//                return $reply;
//
//            }
//        }







        return view('post',compact('post','comments','previous','next','categories','user','postsCount','postComments'));

//        return View::make('post')->with('previous', $previous)->with('next', $next);
    }


}

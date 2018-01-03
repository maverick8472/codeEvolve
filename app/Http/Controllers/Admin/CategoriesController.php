<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();


        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');

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

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);


            $photo = Photo::create(['file'=>$name,'user_id' => $user->id]);


            $input['photo_id'] = $photo->id;


        }else{


            $photo = url('/images/category_header_placeholder.jpg');

            $name = basename($photo);

            $photo = Photo::create(['file'=>$name,'user_id'=> $user->id]);

            $input['photo_id'] = $photo->id;
        }


        Category::create($input);

        return redirect('admin\categories');
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
//        $users = User::all();
//
//
//        $photo = url('/images/header_image.jpg');
//
//
////        $users = User::find($id);
////        $posts = Post::where("user_id", "=", $users->id)->get();
//        $category = Category::findOrFail($id);
//        $posts = Post::where("category_id", "=" , $category->id)->get();
////                $posts = Post::where($category->id)->get();
//
////        $users = Post::where('user_id','=' , $users->id)->get();
//
//
////        $posts = Category::find($category->id)->posts;
//
//
//
//        return view('categories',compact('category','posts','photo','users'));


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
        $category = Category::findOrFail($id);

        return view('admin.categories.edit',compact('category'));
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

        $category = Category::findOrFail($id);
        $input = $request->all();

//        $category = Category::findOrFail($id);
//
//        $category->update($input);
//
////        return 'oro ja njivu';
//
//        return redirect('admin/categories');

        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);



            $photo = Photo::create(['file'=>$name,'user_id' => $user->id]);

            $input['photo_id'] = $photo->id;

        }

//        Auth::users()->posts()->whereId($id)->first()->update($input);
//        $users->update($input);
        $category->update($input);

//        Category::update($input);
//        Category::whereId($id)->update($input);
//        Selection::whereId($id)->update($request->all()));




//        Post::update($input);

        return redirect('admin/categories');
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

        $category = Category::findOrFail($id);

        unlink(public_path() . $category->photo->file);

        $category->delete();
//        Category::findOrFail($id)->delete();

//        return 'oro ja nivu 2';
        return redirect('admin/categories');
    }


}

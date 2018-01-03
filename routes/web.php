<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    $post = Post::all()->random();
    return view('welcome',compact('post'));
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin'],function (){


    Route::get('/admin',function(){

        return view('admin.index');
    });

    Route::resource('admin/users','Admin\UsersController');
    Route::resource('admin/posts','Admin\PostsController');
    Route::resource('admin/categories','Admin\CategoriesController');
    Route::resource('admin/media','Admin\MediasController');
    Route::resource('comments','PostCommentsController');
    Route::resource('comment/replies','CommentRepliesController');

//    custom controller
//    Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediasController@store']);





    //delete users link
    Route::get('admin/users/{user}', [
        'as' => 'delete_user_path',
        'uses' => 'Admin\UsersController@destroy'
    ]);

    //delete post link
    Route::get('admin/posts/{post}', [
        'as' => 'delete_post_path',
        'uses' => 'Admin\PostsController@destroy'
    ]);

//    Route::get('admin/categories/{id}'[]);



});


Route::get('category/{id}','CategoriesController@show')->name('category');

Route::get('/post/{id}',['as'=> 'home.post','uses'=>'Admin\PostsController@post']);


Route::group(['middleware' => 'author'],function (){


    Route::get('/author',function(){

        return view('author.index');
    });

//    Route::resource('author/users','Author\UsersController');
//    Route::get('/test','test\TestController@getTest');
//    Route::get('author/users','Author\UsersController@edit')->name('author_edit');
//
    Route::resource('author/users','Author\UsersController',['names'=>[

        'index' => 'author.users.index',
        'create' =>'author.users.create',
        'store' => 'author.users.store',
        'edit' => 'author.users.edit',
        'destroy' => 'author.users.destroy'

    ]]);
//    Route::resource('author/author','Author\AuthorController');


});



Route::group(['middleware' => 'auth'],function () {


    Route::post('comment/replay','CommentRepliesController@createReply');


});


//Route::get('/admin',function (){
//
//    return view('admin.index');
//});
////
//Route::resource('admin/users','Admin\UsersController2');
//Route::resource('admin/posts','Admin\PostsController');
//Route::resource('admin/categories','Admin\CategoriesController');






//Route::get('blog/{id}',[
//    'as' => 'blog.show',
//    'uses' => 'BlogController@art'
//]);

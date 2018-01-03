<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $file = Storage::disk('local')->get('profile_placeholder_400X400.jpg');

//        return view('admin.users.index',compact('photo'));

        $users = User::all();
        return view('admin.users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        $input = $request->all();



        if($request->file('photo_id')){

            $file = $request->file('photo_id');

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file' => $name,'user_id' => Auth::user()->id]);

            $input['photo_id'] = $photo->id;
        }else{

            $photo = url('/images/profile_placeholder.jpg');

            $name = basename($photo);

            $photo = Photo::create(['file'=>$name,'user_id'=> Auth::user()->id]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt(($request->password));
        User::create($input);

        return redirect('/admin/users');







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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));

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
        $user = User::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name,'user_id'=> $user->id]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect('/admin/users');

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



        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        if($user->delete()){
            Session::flash('success','The User has been deleted!');

        }else{
            Session::flash('failure','Failed to delete users');
        }
//        $users->delete();


        return redirect('/admin/users');
    }
}

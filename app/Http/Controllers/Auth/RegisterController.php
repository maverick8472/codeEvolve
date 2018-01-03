<?php

namespace App\Http\Controllers\Auth;

use App\Photo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new users instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        $input = $data->all();

//        $data['photo_id'] = '/images/profile_placeholder_400X400.jpg';

//        $photo = file('/images/profile_placeholder_400X400.jpg');
//        $name = $photo->getClientOriginalName();
//        $file = Storage::get();
//        $file = Storage::disk('local')->get('profile_placeholder_400X400.jpg')
//        $name = $file->getClientOriginalName();
//        $photo = Photo::create(['file'=>'profile_placeholder']);



//        $photo = url('/images/profile_placeholder.jpg');
//
//        $name = basename($photo);
//
//        $photo = Photo::create(['file'=>$name,'user_id' => rand(1,20)]);
//
////        $photo = Photo::create(['file' => $name]);
//
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
////            'photo_id' => '/images/profile_placeholder_400X400.jpg',
//
////            'photo_id' => $photo->id
//
//            'photo_id' => $photo->id
//        ]);

        $photo = url('/images/profile_placeholder.jpg');
//
        $name = basename($photo);



        $user = new User();

        $user['name'] = $data['name'];
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);
        $user['photo_id'] = rand(1,20);
        $user->save();

        Photo::create(['file'=>$name,'user_id' => $user->id]);

//        $photo = Photo::create(['file' => $name]);


        return $user;

//

    }
}

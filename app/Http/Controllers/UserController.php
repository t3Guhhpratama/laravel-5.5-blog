<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsers;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
      $data = DB::table('users')->get();
      return response()->json($data);
    }

    public function create(Request $request)
    {
      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');

      $hashed = Hash::make($password);

      $user = DB::insert('insert into users (name, email, password) values (?, ?,?)', [$name, $email, $hashed]);
      return response()->json($user);
    }

    public function login(Request $request)
    {
      $email = $request->input('email');
      $password = $request->input('password');
      $users = DB::table('users')->where('email',$email)->first();
      if($users){
        if (Hash::check($password, $users->password)) {
            // The passwords match...
            return response()->json('success');
        }
      }
      return response()->json('failed');
    }

    public function uploadPhoto(Request $request)
    {
      // $files = Storage::files('images');
      // $files = Storage::get('images/ES6HeHDKm3k2w8kLdwtr2VrVKI8FKEKgj5xlf77w.jpeg');
      // dd($files);
      if ($request->hasFile('photo')) {
          $path = $request->photo->store('images');
          dd($path);
          return response()->json('success');
      }
      return response()->json('No Data');
    }
}

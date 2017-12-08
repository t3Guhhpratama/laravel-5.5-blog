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
      if ($request->hasFile('files')) {
          $data = $request->file('files');
          // return $data[0];
          $path = $data[0]->store('images');
          // return $path;
          return response()->json([
            'files' => [
              [
                'url' => asset('storage/'.$path)
              ]
            ]
          ]);
      }
      return response()->json('No Data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
      return DB::table('user')->get();
      $value = Cache::remember('user', 1 , function() {
          return DB::table('user')->get();
      });
      // $value = Cache::get('user');
      return $value;
    }
    public function create(Request $request)
    {
      $hashed = Hash::make('qwerty', [
          'rounds' => 12
      ]);
      $user = DB::insert('insert into user (email, password) values (?, ?)', ['t@gmail.com', $hashed]);
      dd($user);
    }
}

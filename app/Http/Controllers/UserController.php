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
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterSuccess;

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
            // dd($users->id);
            // Auth::loginUsingId($users->id);
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

    public function deletePhoto(Request $request)
    {
      $data = $request->input('file');
      $slicePath = str_after($data, 'storage/');
      Storage::delete($slicePath);
      return 'success';
    }

    public function auth(){
      $user = Auth::id();
      return $user;
    }

    public function sendMail($email){
      $data = ['name'=>$email];
      Mail::to($email)->send(new RegisterSuccess($data));
      return 'success';
    }
}

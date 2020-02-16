<?php
namespace App\Http\Controllers;
use Auth;
use Hash;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class AuthController extends Controller
{
    public function __construct(Request $request){

    }
    public function login(Request $request){
        return view('login');
      }
  
      public function check(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
  
        $user = User::where('email', $email)->first();
  
        if (!$user) {
          Session::flash('message', 'user is not exists.');
          return redirect()->back();
        }
  
        if (!Hash::check($password, $user->password)) {
          Session::flash('message', 'email and password is not match.');
          return redirect()->back();
        }
  
        Auth::login($user, $request->has('stay-login'));
  
        return redirect()->route("dashboard.home",['any'=>'news/list']);
      }
  }
              
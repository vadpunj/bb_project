<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
      return view('register');
    }

    public function postregister(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
      ]);
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);
      return redirect()->back();
    }
    public function login()
    {
      return view('login');
    }
    public function postlogin(Request $request)
    {
      $this->validate($request,[
         'email'=>'required|email',
         'password'=>'required'
      ]);
      if(!\Auth::attempt(['email' => $request->email,'password'=> $request->password])){
        return redirect()->back();
      }
      return redirect()->route('home');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }
}

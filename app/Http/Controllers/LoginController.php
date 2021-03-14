<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()!=null){
            Auth::logout();
        }
        $x="";
        return view('login.index', compact('x'));
    }
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->action('LoginController@welcome');
        }
        else{
            $x="wrong username/password";
            return view('login.index', compact('x'));      
        }
    }
    public function wrongcreds(){
        
    }
    public function welcome(){
        $username="";
        if (Auth::user()!=null) {
            $username=Auth::user()->username;
            return view('login.welcome', compact('username'));
        }
        else{
            return redirect()->action('LoginController@index');
        }
        
    }
    public function register(){
        return view('login.register');
    } 
    public function registered(Request $request){
        $username = $request->user;
        $password = $request->pass;
        $repassword = $request->repass;
        if($password != $repassword){
            return view('login.register');
        }
        else{
            DB::table('users')->insert([
                'username' => $username,
                'password' => Hash::make($password)
            ]);
            return view('login.registered',compact('username'));
        }
    } 
}
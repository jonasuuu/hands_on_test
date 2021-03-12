<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
        $x="";
        return view('login.index', compact('x'));
    }
    public function login(Request $request){
        $x="";
        if(isset($request->Login)){
            $username = $request->user;
            $password = $request->pass;
            $check = DB::table('users')
                    ->where('username', $username)
                    ->get();
            if (count($check) >0) {
                if(Hash::check($password, $check[0]->password)){
                    return view('login.welcome',compact('username'));
                }
                else{
                    $x= "username/password incorrect";
                    // return "<script type='text/javascript'>alert('username/password incorrect');</script>";
                    return view('login.index', compact('x'));
                }
            }
        }
        else{
            $x= "enter username/password";
            return view('login.index', compact('x'));
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
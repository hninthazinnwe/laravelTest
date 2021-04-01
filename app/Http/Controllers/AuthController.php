<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    function login(){
        return view("auth.login");
    }
    //Register
    function register(){
        return view("auth.register");
    }
    //post_register
    function post_register(){
        $validation = Request()->validate([
            'username'=>"required",
            'email'=>"required",
            'password'=>"required || min:8 || confirmed",
            'image'=>"required",
        ]);

        if($validation) {
            // move image to public folder
            $image = Request('image');
            $image_name = uniqid()."_".Request('image')->getClientOriginalName();
            $image->move(public_path('images/profiles'), $image_name);
            
            // save user to database
            $user = new User();
            $user->name = $validation['username'];
            $user->email = $validation['email'];
            $user->password = Hash::make($validation['password']);
            $user->image = $image_name;
            $user->save();
            if(Auth::attempt(["email"=>$validation['email'], "password"=>$validation['password']])){
                return redirect()->route('home');
            }
        }else{
            return back()->withErrors($validation);
        }
    }
    function post_login() {
        $validation = Request()->validate([
            'email'=>'required',
            'password'=>'required ||  min:8',
        ]);
        if($validation){
            $auth=Auth::attempt(["email"=>$validation['email'], "password"=>$validation['password']]);
            if($auth){
                return redirect()->route('home');
            }else{
                return back()->with('error', 'Authentication failed. Try again!');
            }
        }else{
            return back()->withErrors($validation);
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    function post_userProfile(){
        $username = Request('username');
        $email = Request('email');
        $oldpassword = Request('old_password');
        $newpassword = Request('new_password');
        $image = Request('image');

        $id = auth()->user()->id;
        $current_user = User::find($id);
        $current_user->name=$username;
        $current_user->email=$email;
        if($image){
            $image_name = uniqid()."_".Request('image')->getClientOriginalName();
            $image->move(public_path('images/profiles'), $image_name);
            $current_user->image=$image_name;
            $current_user->update();

            return back()->with('profileSuccess', 'Image Updated!');
        }
        if($oldpassword && $newpassword){
            if(Hash::check($oldpassword, $current_user->password)){
                $current_user->password=Hash::make($newpassword);
                $current_user->update();
                return back()->with('profileSuccess', 'Password Updated!');
            }else{ 
                return back()->with('profileError', 'OldPassword and NewPassword is not the same!');
            }
        }
        $current_user->update();
        return back();
    }
}

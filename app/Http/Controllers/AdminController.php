<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function managePremiumUser(){
        $users=User::latest()->get();
        return view('admin.managePremiunUser', ["users"=>$users]);
    }
    function contactMessage(){
        $messages = ContactMessage::latest()->get();
        return view('admin.contactMessage', ['messages'=>$messages]);
    }
    function deleteUser($id){
        $deletUser=User::find($id);
        $deletUser->delete();
        return back()->with("message", "User deleted!");
    }
    function editUser($id){
        $editUser=User::find($id);
        return view('admin.editUser', ["user"=>$editUser]);
    }
    function updateUser($id){
        $updateUser=User::find($id);
        if(request('isAdmin')){
            $updateUser->isAdmin=true;
        }else{
            $updateUser->isAdmin=false;
        }
        if(request('isPremium')){
            $updateUser->isPremium=true;
        }else{
            $updateUser->isPremium=false;
        }
        // return $updateUser;
        $updateUser->update();

        return redirect()->route('admin.managePremiumUser');
    }
}
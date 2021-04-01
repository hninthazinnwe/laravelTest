<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function postContactMessage(){

        $validation = Request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
            $contactMessage = new ContactMessage();
            $contactMessage->username=$validation['username'];
            $contactMessage->email=$validation['email'];
            $contactMessage->message=$validation['message'];
            $contactMessage->save();

            return back()->with('message', 'Message sent to admin!');
        }else{
            return back()->withErrors($validation);
        }

    }
    function deleteMessage($id){
        $deleteData = ContactMessage::find($id);
        $deleteData->delete();
        return back()->with("message", "Message Deleted!");
    }
    function editMessage($id){
        $updateData=ContactMessage::find($id);
        return view('admin.editMessage', ["updateData"=>$updateData]);
    }
    function updateMessage($id){
        $validation = Request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
            $updateData=ContactMessage::find($id);
            $updateData->username=request('username');
            $updateData->email=request('email');
            $updateData->message=request('message');
            $updateData->update();
            return redirect()->route('admin.contactMessage');
        }else{
            return back()->withErrors($validation);
        }
    }
}

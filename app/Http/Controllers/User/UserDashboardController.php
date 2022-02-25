<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userid=Auth::user()->id;
        $userComments=Comment::where('userid',$userid)->count();
        
        return view('user.index')->with(compact('userComments'));
    }

    public function userProfile()
    {
        $auth_userid=Auth()->user()->userid;
        
        //get user data user id according
         $userdata=User::where('userid',$auth_userid)->first();
    return view('user.userProfile')->with(compact('userdata'));
        
    }

       public function updateProfile(Request $request)
       {
        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $userid=$request->userid;

        $updatDatas=User::where('id',$id)->update(["name" => $name,"email" => $email,"userid" => $userid]);

          if ($updatDatas) {
                return response()->json(['success'=>'done']);
            }
            else {
                return response()->json(['error'=>'failed']);
            }
        
       }
}

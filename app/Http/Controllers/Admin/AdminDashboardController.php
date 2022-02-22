<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

use App\Models\Admin\Blog;

class AdminDashboardController extends Controller
{
   public function index()
   {
     $comments=Comment::latest()->get();
     
     $userCount = User::where('role_id','2')->count();
     $blogCount = Blog::count();
     $commentCount = Comment::count();
   
     
       return view('admin.index')->with(compact('comments','userCount','blogCount','commentCount'));
   }

   public function adminProfile()
   {
    $admindata=User::where('role_id','1')->first();
    return view('admin.adminProfile')->with(compact('admindata'));
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

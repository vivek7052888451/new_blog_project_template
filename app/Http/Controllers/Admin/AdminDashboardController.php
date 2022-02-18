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

}

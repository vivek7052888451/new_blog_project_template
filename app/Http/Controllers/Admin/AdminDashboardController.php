<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;

use App\Models\Admin\Blog;

class AdminDashboardController extends Controller
{
   public function index()
   {
     //$comments=Comment::latest()->get();
     
     $userCount = User::where('role_id','2')->count();
     $blogCount = Blog::count();
     $commentCount = Comment::count();
     $likeCount = Like::count();
   
     
       return view('admin.index')->with(compact('userCount','blogCount','commentCount','likeCount'));
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

   public function totalUser()
   {
         $html = "";
       $users=User::where('role_id','2')->get();
    

        // Loop result
        foreach($users as $user)
        {
          // Concatenate variable
          $html .= '
            <tr>
              <td>'. $user->id .'</td> 
              <td>'. $user->userid .'</td>
              <td>'. $user->name .'</td>
              <td>'. $user->email .'</td>
              <td>'. $user->mobile .'</td>
              
            </tr>
          ';
        }
        return response()->json($html);

   }

   public function totalComment()
   {
     $comments=Comment::all();
     $html='';

       foreach($comments as $comment)
        {
          // Concatenate variable
          $html .= '
            <tr>
              <td>'. $comment->id .'</td> 
              <td>'. $comment->userid .'</td>
              <td>'. $comment->username .'</td>
              <td>'. $comment->email .'</td>
              <td>'. $comment->comment .'</td>
              <td>'. $comment->blog_id .'</td>
              
            </tr>
          ';
        }

        return response()->json($html);
   }

     public function totalBlog()
     {
       $blogs=Blog::all();
       
       $html='';

         foreach($blogs as $blog)
          {
            // Concatenate variable
            $html .= '
              <tr>
                <td>'. $blog->id .'</td> 
                <td>'. $blog->category_id .'</td>
                <td>'. $blog->title .'</td>
               
                
              </tr>
            ';
          }

          return response()->json($html);
     }

      public function totallike()
       {
         $likes=like::all();
         
         $html='';

           foreach($likes as $like)
            {
              // Concatenate variable
              $html .= '
                <tr>
                  <td>'. $like->id .'</td>
                  <td>'. $like->userid .'</td> 
                  <td>'. $like->username .'</td>
                  <td>'. $like->blog_id .'</td> 
                </tr>
              ';
            }

            return response()->json($html);
       }

}

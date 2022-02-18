<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        $blog_categorys=Category::latest()->get();
       
        $blogs=Blog::all();
      
        $latest_blogs=Blog::latest()->take(8)->get();
        return view('index')->with(compact('blogs','latest_blogs','blog_categorys'));
    }

    public function post($id)
    {
       
        $posts=Blog::where('slug',$id)->first();
        $blog_id=$posts->id;

         $latest_posts=Blog::latest()->take(5)->get();
        $comments =Comment::latest()->where("blog_id",$blog_id)->get();

        
        return view('postdetails')->with(compact('posts','latest_posts','comments'));     
    }

    public function postComment(Request $request)
    {


        if (Auth::check()) {
            //dd($request);
            $userid=auth()->user()->id;
            $username=auth()->user()->name;
            $email=auth()->user()->email;
            
        $comment=$request->comment;
        $blog_id=$request->blog_id;

       Comment::create(['username'=>$username,'userid'=>$userid,'email'=>$email,'comment'=>$comment,'blog_id'=>$blog_id]);
        return response()->json(['success'=>'done']);  
      }
      else
      {
        //return redirect()->back()->with('error','plz login and register');
        return redirect('postdetails')->with('error',"Only Login User can access!");
      
      }        
    } 
    public function allPost()
    {
        $blog_categorys=Category::latest()->get();
         $blogs=Blog::latest()->get();
          $latest_one=Blog::latest()->take(1)->first(); 

        return view('allblog')->with(compact('blogs','latest_one','blog_categorys'));
    }

    public function categoryList($slug)
    {
        $category=Category::where('slug',$slug)->get('id');        
        $category_data=Blog::where('category_id',$category[0]->id)->get();     
        
        $latest_category=Category::latest()->get();
         $latestposts=Blog::latest()->get(); 

       return view('listing')->with(compact('latestposts','category','category_data'));
    }
}

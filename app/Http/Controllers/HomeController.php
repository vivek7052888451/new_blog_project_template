<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
   
    public function index()
    {
        
        $blog_categorys=Category::latest()->get();
       
        $blogs=Blog::all();
      
        $latest_blogs=Blog::latest()->get();
       
        return view('index')->with(compact('blogs','latest_blogs','blog_categorys'));
    }

    public function post($id)
    {       
        $posts=Blog::where('slug',$id)->first();

        $blog_id=$posts->id;

         $latest_posts=Blog::latest()->take(5)->get();
        $comments =Comment::latest()->where("blog_id",$blog_id)->get();
        $count =Comment::where("blog_id",$blog_id)->count();
        $countLikes =Like::where("blog_id",$blog_id)->where('like_status','1')->count();
       


        $latest_threes=Blog::latest()->take(3)->get();
        $Posts_categorys=Category::latest()->get();

        return view('postdetails')->with(compact('posts','latest_posts','comments','latest_threes','Posts_categorys','count','countLikes'));     
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
         $blogs=Blog::latest()->paginate(10);
          $latest_threes=Blog::latest()->take(3)->get(); 

        return view('allblog')->with(compact('blogs','latest_threes','blog_categorys'));
    }

    public function categoryList($slug)
    {

        $category=Category::where('slug',$slug)->get('id');        
        $category_datas=Blog::where('category_id',$category[0]->id)->get();     
        
        $latest_category=Category::latest()->get();
         $latestposts=Blog::latest()->get();
         $latest_threes=Blog::latest()->take(3)->get();  

       return view('listing')->with(compact('latestposts','category','category_datas','latest_threes','latest_category'));
    }

    public function allCategory()
    {
        $latest_categorys=Category::latest()->get();

        return view('category')->with(compact('latest_categorys'));

    }

    public function search(Request $request)
    {

        $this->validate($request,['search'=>'required |max:255']);
        $search=$request->search;
        $posts=Blog::where('title','like', "%$search%")->get();
        $latest_threes=Blog::latest()->take(3)->get();
        $latest_category=Category::latest()->get();
        return view('search')->with(compact('posts','latest_threes','latest_category'));
    }

    public function likeAdd(Request $request)
    { 
       if (Auth::check()) {
             $auth_id=Auth::user()->id;
             $auth_name=Auth::user()->name;       
             $blog_id=$request->id;
             $data=Like::where('userid',$auth_id)->where('blog_id',$blog_id)->get()->toArray();

            if(count($data) == 0)
            {
                 $user = Like::create([
                'username'=>$auth_name,
                'userid'=>$auth_id,          
                'blog_id'=>$blog_id,           
            ]);
            }
            else
                {
                 $data=Like::where('userid',$auth_id)->where('blog_id',$blog_id)->first()->like_status;
                     if(!$data == '1')
                     {
                        $status=Like::where('userid',$auth_id)->where('blog_id',$blog_id)->update(
                        ["like_status" =>'1']);


                         if ($status) {
                                return response()->json(['success'=>'done1']);
                            }
                            else {
                                return response()->json(['error'=>'failed']);
                            }
                     }
                     else
                     {
                         $status=Like::where('userid',$auth_id)->where('blog_id',$blog_id)->update(
                        ["like_status" =>'0']);


                         if ($status) {
                                return response()->json(['success'=>'done2']);
                            }
                            else {
                                return response()->json(['error'=>'failed']);
                            }
                     }
            }
                    
       }
       else
       {
        dd('You are not Auth user');
       }
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $categorys=Category::all();

        $blogs=Blog::latest()->get();
       

         $userCount = User::where('role_id','2')->count();
         $blogCount = Blog::count();
         $commentCount = Comment::count();
        return view('admin.blog')->with(compact('blogs','userCount','blogCount','commentCount','categorys'));
    }
    public function store(Request $request)
    {

        $data = $request->all();
        $data['slug']=Str::slug($request->title);
       

        if($image=$request->file('image'))
        {
            $destinationPath='backend/images/uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $data['image'] = "$postImage";
        }
        $data=Blog::create($data);

          if ($data) {
            return response()->json(['success'=>'done']);
        }
        else {
            return response()->json(['error'=>'failed']);
        }
       
       // return response()->json(['success'=>'done']);
        
    }
    public function delete(Request $request)
    {
         $id = $request->id;
         $data=Blog::find($id);

        $location='backend/images/uploads/'.$data->image;

        if(File::exists($location))
        {
            unlink($location);
        }
        $deleteBlog=$data->delete();

             if ($deleteBlog) {
            return response()->json(['success'=>'done']);
        }
        else {
            return response()->json(['error'=>'failed']);
        }
        // return response()->json(['success'=>'done']);
    }

    public function update(Request $request)
    {
        
      $blogs=Blog::find($request->id);
       $blogs->title=$request->title;
       $blogs->discription=$request->discription;
       if($request->hasfile('image'))
        {
         $des='backend/images/uploads/'.$blogs->image;
         
         if(File::exists($des))
         {
             File::delete($des);
         }
            $image = $request->file('image');
                           
                 $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                 $image->move('backend/images/uploads/', $postImage); 
                 $blogs->image= $postImage;                
         }
         else
         {
            $blogs=Blog::find($request->id);
            $blogs->title=$request->title;
            $blogs->discription=$request->discription;
            $data=$blogs->save();

                if ($data) {
                        return response()->json(['success'=>'done']);
                    }
                    else {
                        return response()->json(['error'=>'failed']);
                    }

            // return response()->json(['success'=>'done1']);
         }
   $data=$blogs->save();
    if ($data) {
            return response()->json(['success'=>'done']);
        }
        else {
            return response()->json(['error'=>'failed']);
        }

}

//category 

public function category()
     {
        $blogs=Blog::latest()->get();
       $latest_categorys=Category::latest()->get();

         $userCount = User::where('role_id','2')->count();
         $blogCount = Blog::count();
         $commentCount = Comment::count();
        return view('admin.category')->with(compact('blogs','userCount','blogCount','commentCount','latest_categorys'));
       
     }

     public function addCategory(Request $request)
     {

        $data = $request->all();

        $data['slug']=Str::slug($request->category_name);
       

        if($category_icon=$request->file('category_icon'))
        {
            $destinationPath='backend/images/category/';
            
            $postImage = date('YmdHis') . "." . $category_icon->getClientOriginalExtension();

            $category_icon->move($destinationPath, $postImage);
            $data['category_icon'] = "$postImage";
        }
        $cat_data=Category::create($data);
             if ($cat_data) {
                    return response()->json(['success'=>'done']);
                }
                else {
                    return response()->json(['error'=>'failed']);
                }
       

       // return response()->json(['success'=>'done']);
    }


       public function deleteCategory(Request $request)
    {
         $id = $request->id;
         $data=Category::find($id);

        $location='backend/images/category/'.$data->category_icon;


        if(File::exists($location))
        {
            unlink($location);
        }
       $cat_data =$data->delete();

        if ($cat_data) {
                    return response()->json(['success'=>'done']);
                }
                else {
                    return response()->json(['error'=>'failed']);
                }
         //return response()->json(['success'=>'done']);
    }

    
        public function categoryUpdate(Request $request)
    {

        
      $categorys=Category::find($request->id);
       $categorys->category_name=$request->category_name;
       
       if($request->hasfile('category_icon'))
        {
         $des='backend/images/category/'.$categorys->category_icon;
         
         if(File::exists($des))
         {

             File::delete($des);
         }
            $category_icon = $request->file('category_icon');
                           
                 $postImage = date('YmdHis') . "." . $category_icon->getClientOriginalExtension();
                 $category_icon->move('backend/images/category/', $postImage); 
                 $categorys->category_icon= $postImage;                
         }
         else
         {
            $categorys=Category::find($request->id);
            $categorys->category_name=$request->category_name;
            
            $cat_data=$categorys->save();
               if ($cat_data) {
                    return response()->json(['success'=>'done']);
                }
                else {
                    return response()->json(['error'=>'failed']);
                }
             //return response()->json(['success'=>'done1']);
         }
   $cat_data= $categorys->save();
       if ($cat_data) {
                    return response()->json(['success'=>'done']);
                }
                else {
                    return response()->json(['error'=>'failed']);
                }
    //return response()->json(['success'=>'done2']);

}

    
}

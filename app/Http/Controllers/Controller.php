<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Redis;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

// <-------------- This Is For Dispalying my home page Along With The Category and post ------------>
    Public Function post()
    {
        $data=Post::with('user')->orderBy('id','desc')->get();
        $cat=Category::get();
        return view('home',compact('data','cat'));
    }


// <---------------------- This Function Show Different Product According to Category In Home Page ----------------->
    Public Function category($id){
        $data=Post::where('category_id',$id)->with('user')->get();
        $cat=Category::get();
        return view('home',compact('data','cat'));
    }

// <---------------------- This Function Show Single Post And Their Comments ----------------->
    Public Function singlepost($id){
        $data=Post::where('id',$id)->get();
        $cat=Category::get();
        $comment=Comment::where('post_id',$id)->get();
        return view('Posts',compact('data','cat','comment'));
    }


// <---------------------- This Function add Comment In post ----------------->
    Public Function addcomment(Request $request){
        $ob=new Comment;
        $ob->user_id=$request->get('user_id');
        $ob->post_id=$request->get('post_id');
        $ob->comment=$request->get('comment');
        $ob->save();
        return redirect('post'.$ob->post_id);
    }


// <---------------------- This Function Search Posts With their Tittle Name ----------------->
    Public Function search(Request $request){
        $search=$request->get('search');
        $data=Post::where('tittle','LIKE','%'.$search.'%')->with('user')->get();
        $cat=Category::get();
        return view('home',compact('data','cat'));
    }


// <---------------------- This Function Upload A new Post By User ----------------->
    Public Function upload_image(Request $request){
        $ob=new Post;
        $ob->tittle=$request->get('tittle');
        $ob->desc=$request->get('desc');
        $ob->user_id=$request->get('user_id');
        $ob->category_id=$request->get('category');
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$_FILES['image']['name'];
            // $file=$_FILES['image']['tmp_name'];
            $extension=explode('.',$name);
            $ex=$extension[1];
            $filename=time().'.'.$ex;
            $image->move('images/posts',$filename);
            $ob->image=$filename;
        }
        $ob->save();
        return redirect('/');
    }


// <---------------------- This Function Show categories in Upload Forn ----------------->
    Public Function show_category(){
        $data=Category::get();
        return view('upload',compact('data'));
    }

    
// <-------------- This Is For Dispalying my home page Along With The Category and post ------------>
    Public Function display_home(){
        $data=Post::with('user')->get();
        $cat=Category::get();
        return view('home',compact('data','cat'));
    }
}

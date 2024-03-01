<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return back()->with('status','Somthing went wrong');
        }else{
             Post::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect(route('posts.all'))->with('status','Post Added successfully ');
        }
       
        
    }
    public function show($post_id){
        $post=Post::findOrfail($post_id);
        return view('post.show',compact('post'));
    }

    public function all_posts(){
        $posts=Post::where('user_id',Auth::user()->id)->get();
        return view('post.all-posts',compact('posts'));
    }
    public function edit_post($post_id){
        $post=Post::findOrfail($post_id);
        return view('post.edit-post',compact('post'));
    }
    public function update_post($post_id,Request $request){
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return back()->with('status','Somthing went wrong');
        }else{
          Post::findOrfail($post_id)->update($request->all());
        return redirect(route('posts.all'))->with('status','Post updated successfull');  
        }


        
    }
    public function delete_post($post_id){
        Post::findOrfail($post_id)->delete();
        return redirect(route('posts.all'))->with('status','Post deleted successfull');
    }
}

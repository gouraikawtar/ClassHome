<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('comments')->orderBy('updated_at','desc')->get();
        
        if(Auth::user()->role == 'student'){
            return view('Student.posts',  [
                'posts'=>$posts,
            ]); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-posts', [
                'posts'=>$posts,
        ]) ;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'content' => 'required' 
        ]);

        $post = new Post(); 
        $post->title = $request->input('title'); 
        $post->content = $request->input('content'); 
        $post->user_id=Auth::user()->id;  
        $post->files()-> content = $request -> input('file');

        if (Auth::user()->role == 'teacher') {
            $post->status = $request->input('status');
            $post->destination= $request->input('destination');
        }
        
        $post->save();

        return redirect()-> route('posts.index'); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request)
    {
        $post = Post::findOrFail($request -> postId); 
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');


        if (User::find($request -> post_id)->role == 'teacher') {
            $post -> status = $request->input('status');
            $post -> destination = $request -> input('destination');
        }
        $post->save(); 
        return redirect()-> route('posts.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Post::destroy($id);
        return redirect()-> route('posts.index'); 
    }

}

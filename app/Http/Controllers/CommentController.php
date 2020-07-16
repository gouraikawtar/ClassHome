<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $class_id)
    {
        $this->validate(request(),[
            'content'=>'min:2|max:100'
            ]); 

        $data = $request->only(['content']);
        $data['user_id']= Auth::user()->id;
        $data['post_id'] = $request->input('post_id');  

        $comment = Comment::create($data);
        return redirect()-> route('myclasses.posts.index', $class_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $class_id = $request->input('classId');
        Comment::destroy($request->input('commentId'));
        
        return redirect()-> route('myclasses.posts.index', $class_id); 
    }
}

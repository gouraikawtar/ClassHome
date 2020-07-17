<?php

namespace App\Http\Controllers;

use App\File;
use App\Group;
use App\Http\Requests\StorePost;
use App\Post;
use App\TeachingClass;
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
    public function index($class_id)
    {
        $teachingClass = TeachingClass::find($class_id);
        $groups=$teachingClass->groups()->get(); 
        $posts=Post::where('teaching_class_id', $class_id)->with('comments')->orderBy('updated_at', 'desc')->get();
        
        if(Auth::user()->role == 'student'){
            return view('Student.posts',  [
                'posts'=>$posts,
                'teachingClass'=>$teachingClass, 
                'groups'=>$groups
            ]); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-posts', [
                'posts'=>$posts,
                'teachingClass'=>$teachingClass, 
                'groups'=>$groups
        ]) ;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request, $class_id)
    {   
        if (Auth::user()->role=='student') {
            $this->validate($request, [
                'title'=>'required',
                'content' => 'required',
                'files.*' => 'bail|max:2000||mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip'
            ]);
        } elseif (Auth::user()->role == 'teacher'){
            $this->validate($request, [
                'title'=>'required',
                'content' => 'required',
                'status' => 'required',
                'files.*' => 'bail|max:2000||mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip'
            ]);
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id=Auth::user()->id;
        $post->teaching_class_id= $class_id;
        if (Auth::user()->role=='teacher') {
            $post->status = $request->input('status');
            $post->group_id=$request->get('destination');
        }
        $post->save();

        $idPost = $post->id;
        if ($request->hasFile('files')) {
            $i = 0;
            foreach ($request->file('files') as $uploadedFile) {
                ;
                $string = 'post_doc_'.$idPost.'_'.++$i;
                $fileName = $string.'.'.$uploadedFile->extension();
                $uploadedFile->move(public_path().'/post_files/', $fileName);
                $file = new File();
                $file->title = $fileName;
                $file->post()->associate($post)->save();
            }
        }

        return redirect()-> route('myclasses.posts.index', $class_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'content' => 'required',
        ]);
        
        $class_id = $request->input('classId');
        $post_id = $request->input('postId');
        $post = Post::findOrFail($post_id); 
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        if (Auth::user()->role=='teacher') {
            $post -> status = $request->input('status');
            $post->group_id=$request->get('destination');
        }
        $post->save(); 

        if ($request->hasFile('files')) {
            $i = 0;
            foreach ($request->file('files') as $uploadedFile) {
                ;
                $string = 'post_doc_'.$post_id.'_'.++$i;
                $fileName = $string.'.'.$uploadedFile->extension();
                $uploadedFile->move(public_path().'/post_files/', $fileName);
                $file = new File();
                $file->title = $fileName;
                $file->post()->associate($post)->save();
            }
        }

        return redirect()-> route('myclasses.posts.index', $class_id); 
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $class_id = $request->input('classId');
        Post::destroy($request->input('postId'));
        
        return redirect()-> route('myclasses.posts.index', $class_id); 
    }


    /**
     * Download post's file
     *
     * @param  string  $fileName
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($fileName){
        return response()->download(public_path('/post_files/'.$fileName));
    }

}

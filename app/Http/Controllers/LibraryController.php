<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks;
        $posts = $teachingClass->posts;
        $homework_files = Collection::make();
        $post_files = Collection::make();

        foreach ($homeworks as $homework) {
            if($homework->joinedDocuments()->exists()){
                $files = $homework->joinedDocuments;
                foreach ($files as $file) {
                    $homework_files->add($file);
                }
            }
        }

        foreach ($posts as $post) {
            if($post->files()->exists()){
                $files = $post->files;
                foreach ($files as $file) {
                    $post_files->add($file);
                }
            }
        }

        if(Auth::user()->role == 'student'){
            return view('Student.library', [
                'teachingClass' => $teachingClass,
                'homework_files' => $homework_files->paginate(8),
                'post_files' => $post_files->paginate(8),
                'active' => 'library',
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-library',[
                'teachingClass' => $teachingClass,
                'homework_files' => $homework_files->paginate(8),
                'post_files' => $post_files->paginate(8),
                'active' => 'library',
            ]);
        }
    }

    /**
     * Search documents method
     */
    public function searchDocuments(Request $request,$class_id){
        $value = $request->get('search');
        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks;
        $posts = $teachingClass->posts;
        
        $homework_files = Collection::make();
        $post_files = Collection::make();

        foreach ($homeworks as $homework) {
            $files = $homework->joinedDocuments()->where('title','like','%'.$value.'%')->get();
            foreach ($files as $file) {
                $homework_files->add($file);
            }
        }

        foreach ($posts as $post) {
            $files = $post->files()->where('title','like','%'.$value.'%')->get();
            foreach ($files as $file) {
                $post_files->add($file);
            }
        }

        if(Auth::user()->role == 'student'){
            return view('Student.library', [
                'teachingClass' => $teachingClass,
                'homework_files' => $homework_files->paginate(8),
                'post_files' => $post_files->paginate(8),
                'active' => 'library',
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-library',[
                'teachingClass' => $teachingClass,
                'homework_files' => $homework_files->paginate(8),
                'post_files' => $post_files->paginate(8),
                'active' => 'library',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

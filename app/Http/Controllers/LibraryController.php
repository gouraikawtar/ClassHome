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
        $files = Collection::make();

        foreach ($homeworks as $homework) {
            $homework_files = $homework->joinedDocuments;
            foreach ($homework_files as $homework_file) {
                $files->add($homework_file);
            }
        }

        if(Auth::user()->role == 'student'){
            return view('Student.library', [
                'teachingClass' => $teachingClass,
                'files' => $files->paginate(8),
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-library',[
                'teachingClass' => $teachingClass,
                'files' => $files->paginate(8),
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

    public function searchDocuments(Request $request,$class_id){
        $value = $request->get('search');
        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks;
        $files = Collection::make();

        foreach ($homeworks as $homework) {
            $homework_files = $homework->joinedDocuments()->where('title','like','%'.$value.'%')->get();
            foreach ($homework_files as $homework_file) {
                $files->add($homework_file);
            }
        }
        
        if(Auth::user()->role == 'student'){
            return view('Student.library', [
                'teachingClass' => $teachingClass,
                'files' => $files->paginate(8),
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-library',[
                'teachingClass' => $teachingClass,
                'files' => $files->paginate(8),
            ]);
        }
    }
}

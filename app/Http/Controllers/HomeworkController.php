<?php

namespace App\Http\Controllers;

use App\Homework;
use App\TeachingClass;
use App\HomeworkDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
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
        $homeworks = Homework::where('teaching_class_id',$class_id)->orderBy('created_at','desc')->paginate(8);
        if(Auth::user()->role == 'student'){
            return view('Student.homework',[
                'homeworks' => $homeworks,
                'teachingClass' =>  $teachingClass,
            ]);
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-homework',[
                'homeworks' => $homeworks,
                'teachingClass' =>  $teachingClass,
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
    public function store(Request $request,$class_id)
    {
       //validating request fields
        $validator = $request->validate([
            'title' => 'bail|required||max:50',
            'desc'  => 'max:255',
            'deadline' => 'required',
            'expires_at' => 'required',
            'files.*' => 'bail|max:2000||mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip',
        ]);
        //
        $teachingClass = TeachingClass::find($class_id);
        //Model instantiation
        $homework = new Homework();
        //Model 
        $homework->title = $request->input('title');
        $homework->description = $request->input('desc');
        $homework->deadline = $request->input('deadline');
        $homework->expire_at = $request->input('expires_at');
        //$homework->teaching_class_id = $class_id;
        $homework->user_id = Auth::user()->id;
        //Database persistence
        $homework->teachingClass()->associate($teachingClass)->save();
        //$homework->save();
        //Session flash message
        $request->session()->flash('homework_created', 'Homework successefully created');
        //getting the homework's id
        $idHomework = $homework->id;
        //if the homework has joined files
        if($request->hasFile('files')){
            //
            $i = 0;
            foreach ($request->file('files') as $uploadedFile) {
                $string = 'homework_doc_'.$idHomework.'_'.++$i;
                $fileName = $string.'.'.$uploadedFile->extension();
                $uploadedFile->move(public_path().'/homework_files/', $fileName);
                //HomeworkDocument instantiation
                $file = new HomeworkDocument();
                $file->title = $fileName;
                //Database persistence
                $file->homework()->associate($homework)->save();
            }
        }
        //redirect
        //return redirect('/homeworks/'.$class_id);
        return redirect()->route('myclasses.homeworks.index',$class_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show($class_id,$homework_id)
    {
        $teachingClass = TeachingClass::find($class_id);
        $homework = Homework::find($homework_id);
        $files = $homework->joinedDocuments;
        
        if (Auth::user()->role == 'student') {
            return view('Student.homework-details',[
                'teachingClass' =>  $teachingClass,
                'homework'  =>  $homework,
                'files' =>  $files,
            ]);
        }elseif (Auth::user()->role == 'teacher') {
            return view('Teacher.teacher-view-homework',[
                'teachingClass' =>  $teachingClass,
                'homework'  =>  $homework,
                'files' =>  $files,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $homework
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
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id, $homework_id)
    {
        $teachingClass = TeachingClass::find($class_id);

        $homework = Homework::find($homework_id);

        $homework->title = $request->input('new_title');
        $homework->description = $request->input('new_desc');
        $homework->deadline = $request->input('new_deadline');
        $homework->expire_at = $request->input('new_exp_at');
        $homework->user_id = Auth::user()->id;

        $homework->teachingClass()->associate($teachingClass)->save();
        $request->session()->flash('homework_edited', 'Homework successefully edited');

        return redirect()->route('myclasses.homeworks.index',$class_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_id, $id)
    {
        $homework = Homework::find($id);
        $homework->delete();
        return redirect()->route('myclasses.homeworks.index',$class_id);
    }

    public function downloadFile($fileName){
        return response()->download(public_path('/homework_files/'.$fileName));
    }
}

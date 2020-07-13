<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Homework;
use Carbon\Carbon;
use App\TeachingClass;
use App\HomeworkDocument;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $homeworks = $teachingClass->homeworks()
                    ->orderBy('created_at','desc')
                    ->paginate(8);
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
        $validator = Validator::make($request->all(), [
            'title' => 'bail|required||max:50',
            'desc'  => 'max:255',
            'deadline' => 'required',
            'files' => 'max:2000',
            'files.*' => 'mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $teachingClass = TeachingClass::find($class_id);
            //Model instantiation
            $homework = new Homework();
            //Model 
            $homework->title = $request->input('title');
            $homework->description = $request->input('desc');
            $homework->deadline = $request->input('deadline');
            $homework->user_id = Auth::user()->id;
            //Database persistence
            $homework->teachingClass()->associate($teachingClass)->save();
            //if the homework has joined files
            if($request->hasFile('files')){
                //
                $i = 0;
                foreach ($request->file('files') as $uploadedFile) {
                    $string = Str::slug($homework->title,'-').'-'.Str::random(6);
                    $fileName = $string.'.'.$uploadedFile->extension();
                    $uploadedFile->move(public_path().'/homework_files/', $fileName);
                    //HomeworkDocument instantiation
                    $file = new HomeworkDocument();
                    $file->title = $fileName;
                    //Database persistence
                    $file->homework()->associate($homework)->save();
                }
            }
            //Create contributions
            $students = $teachingClass->students;
            foreach ($students as $student) {
                $contribution = new Contribution();
                $contribution->title = $homework->title;
                $contribution->user_id = $student->id;
                $contribution->homework()->associate($homework)->save();
            }
            //return response
            return response()->json(['success' => '1']);
        }
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
            return view('Teacher.teacher-homework-details',[
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
    public function edit($class_id,$homework_id)
    {
        $teachingClass = TeachingClass::find($class_id);
        $homework = Homework::find($homework_id);
        $files = $homework->joinedDocuments;
        if (Auth::user()->role == 'teacher') {
            return view('Teacher.teacher-edit-homework',[
                'teachingClass' =>  $teachingClass,
                'homework'  =>  $homework,
                'files' =>  $files,
            ]);
        }
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
        $request->validate([
            'new_title' => 'bail|required||max:50',
            'new_desc'  => 'max:255',
            'new_deadline' => 'required',
            'new_files' => 'max:2000',
            'new_files.*' => 'mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip',
        ]);

        $teachingClass = TeachingClass::find($class_id);
        $homework = Homework::find($homework_id);

        $homework->title = $request->input('new_title');
        $homework->description = $request->input('new_desc');
        $homework->deadline = $request->input('new_deadline');
        $homework->user_id = Auth::user()->id;
        //Database persistence
        $homework->teachingClass()->associate($teachingClass)->save();
        //getting the homework's id
        $idHomework = $homework->id;
        //if the homework has joined files
        if($request->hasFile('new_files')){
            //dd('WEEEEEEEE AREEEEEEEEEEEEE IIIIIIIIIIIIIIIIIN');
            //
            foreach ($request->file('new_files') as $uploadedFile) {
                $string = Str::slug($homework->title,'-').'-'.Str::random(6);
                $fileName = $string.'.'.$uploadedFile->extension();
                $uploadedFile->move(public_path().'/homework_files/', $fileName);
                //HomeworkDocument instantiation
                $file = new HomeworkDocument();
                $file->title = $fileName;
                //Database persistence
                $file->homework()->associate($homework)->save();
            }
        }
        $request->session()->flash('homework_edited', 'Homework successefully edited');
        //return redirect()->back();
        return redirect()->route('myclasses.homeworks.index',$class_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $class_id, $id)
    {
        $homework = Homework::find($id);
        $homework->delete();
        $request->session()->flash('homework_deleted', 'Homework successefully deleted');
        return redirect()->route('myclasses.homeworks.index',$class_id);
    }

    public function downloadFile($fileName){
        return response()->download(public_path('/homework_files/'.$fileName));
    }

    public function searchHomeworks(Request $request, $class_id){
        $value = $request->get('search');
        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks()
                    ->where('title','like','%'.$value.'%')
                    ->orderBy('created_at','desc')
                    ->paginate(8);
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
}
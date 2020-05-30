<?php

namespace App\Http\Controllers;

use App\Homework;
use App\HomeworkDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$homeworks = DB::table('homeworks')->paginate(5);
        //$homeworks = Homework::get()->sortByDesc('created_at')->paginate(5);
        $homeworks = Homework::orderBy('created_at','desc')->paginate(8);
        return view('Teacher.teacher-homework',[
            'homeworks' => $homeworks
        ]);
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
       //validating request fields
        $validator = $request->validate([
            'title' => 'bail|required||max:50',
            'desc'  => 'max:255',
            'deadline' => 'required',
            'expires_at' => 'required',
            'files.*' => 'bail|max:2000||mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip',
        ]);
        //Model instanciation
        $homework = new Homework();
        //Model 
        $homework->title = $request->input('title');
        $homework->description = $request->input('desc');
        $homework->deadline = $request->input('deadline');
        $homework->expire_at = $request->input('expires_at');
        $homework->teaching_class_id = 1;
        $homework->user_id = 1;
        //Database persistence
        $homework->save();
        //Session flash message
        $request->session()->flash('homework_created', 'Homework successefully created');
        //getting the homework's id
        $idHomework = $homework->id;
        //if the homework has joined files
        if($request->hasFile('files')){
            //
            $i = 0;
            foreach ($request->file('files') as $uploadedFile) {;
                $string = 'homework_doc_'.$idHomework.'_'.++$i;
                $fileName = $string.'.'.$uploadedFile->extension();
                $uploadedFile->move(public_path().'/homework_files/', $fileName);
                //HomeworkDocument instansiation
                $file = new HomeworkDocument();
                $file->title = $fileName;
                //Database persistence
                $file->homework()->associate($homework)->save();
            }
        }
        //redirect
        return redirect()->route('homeworks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homework = Homework::find($id);
        $files = $homework->joinedDocuments;
        $files_nbr = $files->count();
        return view('Teacher.teacher-view-homework',[
            'homework'  =>  $homework,
            'files' =>  $files,
            'files_nbr' =>  $files_nbr,
        ]);
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
    public function update(Request $request, $id)
    {
        $homework = Homework::find($id);

        $homework->title = $request->input('new_title');
        $homework->description = $request->input('new_desc');
        $homework->deadline = $request->input('new_deadline');
        $homework->expire_at = $request->input('new_exp_at');
        $homework->teaching_class_id = 1;
        $homework->user_id = 1;

        $homework->save();
        $request->session()->flash('homework_edited', 'Homework successefully edited');

        return redirect()->route('homeworks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homework = Homework::find($id);
        $homework->delete();
        return redirect()->route('homeworks.index');
    }

    public function downloadFile($fileName){
        return response()->download(public_path('/homework_files/'.$fileName));
    }
}

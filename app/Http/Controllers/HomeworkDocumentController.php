<?php

namespace App\Http\Controllers;

use App\HomeworkDocument;
use Illuminate\Http\Request;

class HomeworkDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\HomeworkDocument  $homeworkDocument
     * @return \Illuminate\Http\Response
     */
    public function show(HomeworkDocument $homeworkDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeworkDocument  $homeworkDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeworkDocument $homeworkDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeworkDocument  $homeworkDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeworkDocument $homeworkDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeworkDocument  $homeworkDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_id, $homework_id, $file_id)
    {
        $file = HomeworkDocument::find($file_id);
        $file_path = public_path().'/homework_files/'.$file->title;
        unlink($file_path);
        $file->delete();
        return redirect()->route('myclasses.homeworks.edit',[$class_id,$homework_id]);
        //dd($file);
    }
}

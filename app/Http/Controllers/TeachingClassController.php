<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeachingClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Teacher.teacher-myclasses',[
            'classes' => TeachingClass::all()
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
        $class = new TeachingClass();

        $class->name = $request->input('name');
        $class->section = $request->input('section');
        $class->object = $request->input('object');
        $class->description = $request->input('description');
        $class->code = Str::random(6);
        $class->user_id = 1;

        $class->save();

        return redirect('/myclasses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function show(TeachingClass $teachingClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingClass $teachingClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingClass $teachingClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingClass $teachingClass)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->role =='student'){
            return view ('Student.dashboard');
        }
        elseif(Auth::user()->role =='teacher'){
            $classes = TeachingClass::orderBy('created_at','desc')->paginate(9);
            return view('Teacher.teacher-myclasses',[
                'classes' => $classes,
                'active' => 'index', 
                /* the 'active' parameter is about to define whether
                * the tab should be active or no
                */
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
        $request->validate([
            'name' => 'bail|required||max:50',
            'section' => 'required',
            'object' => 'max:100',
            'description' => 'max:100',
        ]);

        $class = new TeachingClass();

        $class->name = $request->input('name');
        $class->section = $request->input('section');
        $class->object = $request->input('object');
        $class->description = $request->input('description');
        $class->code = Str::random(6);
        $class->user_id = 1;

        $class->save();
        $request->session()->flash('class_created', 'Class created successfully');
        return redirect()->route('myclasses.index');
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
    public function edit($class_id)
    {
        $teachingClass = TeachingClass::find($class_id);

        return view('Teacher.teacher-settings',[
            'teachingClass' => $teachingClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        $request->validate([
            'class_name' => 'bail|required||max:50',
            'class_section' => 'required',
            'class_object' => 'max:100',
            'class_description' => 'max:100',
        ]);
        
        $teachingClass = TeachingClass::find($class_id);

        $teachingClass->name = $request->input('class_name');
        $teachingClass->section = $request->input('class_section');
        $teachingClass->object = $request->input('class_object');
        $teachingClass->description = $request->input('class_description');

        $teachingClass->save();
        $request->session()->flash('info_edited', 'Class information edited successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $class_id)
    {
        //Archive a class
        $teachingClass = TeachingClass::find($class_id);
        $teachingClass->delete();
        $request->session()->flash('class_archived','Class archived successfully');
        return redirect()->back();
    }

    public function archive(){
        $archivedClasses = TeachingClass::onlyTrashed()->paginate(9);
        return view('Teacher.teacher-archive',[
            'archivedClasses' => $archivedClasses,
            'active' => 'archive',
            /* the 'active' parameter is about to define whether
             * the tab should be active or no
             */
        ]);
    }

    public function restore(Request $request, $class_id){
        //dd($class_id);
        $archivedClass = TeachingClass::onlyTrashed()
                        ->where('id',$class_id)
                        ->first();
        //dd($archivedClass);
        $archivedClass->restore();
        $request->session()->flash('class_restored','Class restored successfully');
        return redirect()->back();
    }

    public function forcedelete(Request $request, $class_id){
        //dd($class_id);
        $archivedClass = TeachingClass::onlyTrashed()
                        ->where('id',$class_id)
                        ->first();
        //dd($archivedClass);
        $archivedClass->forceDelete() ;
        $request->session()->flash('class_deleted','Class deleted successfully');
        return redirect()->back();
    }

    public function resetCode(Request $request, $class_id){
        $teachingClass = TeachingClass::find($class_id);
        $teachingClass->code = Str::random(6);
        $teachingClass->save();
        $request->session()->flash('code_reset', 'Code reset successfully');
        return redirect()->back();
    } 
}
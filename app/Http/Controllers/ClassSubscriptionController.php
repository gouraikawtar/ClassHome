<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use App\ClassSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassSubscriptionController extends Controller
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
     * @param  \App\ClassSubscription  $classSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSubscription $classSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassSubscription  $classSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSubscription $classSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassSubscription  $classSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSubscription $classSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassSubscription  $classSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSubscription $classSubscription)
    {
        //
    }

    public function joinClass(Request $request){
        $studentId = Auth::user()->id;
        $class_code = $request->input('code');
        $teachingClass = DB::table('teaching_classes')
                            ->select('id')
                            ->where('code',$class_code)
                            ->first();
        //dd($teachingClassId);
        if($teachingClass){
            $subscription = new ClassSubscription();
            $subscription->user_id = $studentId;
            $subscription->teaching_class_id = $teachingClass->id;
            $subscription->save();
            $request->session()->flash('class_joined', 'Class joined successfully');
        }else{
            //dd('je suis dans le else');
            $request->session()->flash('junction_failed', 'Class not found');
        }
        return redirect()->back();
    }
}
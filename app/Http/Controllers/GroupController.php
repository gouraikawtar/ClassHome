<?php

namespace App\Http\Controllers;

use App\Group;
use App\TeachingClass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $groups = Group::where('teaching_class_id',$class_id)
                ->with('users')
                ->with('responsible')
                ->orderBy('created_at','desc')
                ->get();
        $teachingClass = TeachingClass::find($class_id);
        $members = $teachingClass->students()->where('role', 'student')->get(); 
        
        if(Auth::user()->role == 'student'){
            return view('Student.groups',  [
                'groups'=>$groups,
                'teachingClass'=>$teachingClass, 
                'members'=>$members
            ]); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-groups', [
                'groups'=>$groups,
                'teachingClass'=>$teachingClass,
                'members'=>$members
            ]);
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
        $this->validate($request, [
            'groupName'   => 'required',
            'groupLeader' => 'required',
            'member2'     => 'required', 
            'member3'     => 'required'
        ]);

        $leader_id = $request->get('groupLeader');
        $member2_id= $request->get('member2');
        $member3_id= $request->get('member3');

        $group = new Group(); 
        $group->name = $request->input('groupName');  
        $group->teaching_class_id = $class_id; 
        $group->user_id= $leader_id;
        $group->save();
        
        $group->users()->saveMany([ User::find($leader_id), User::find($member2_id),User::find($member3_id) ]);

        return redirect()-> route('myclasses.groups.index', $class_id); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function updateName(Request $request)
    {
        $group = Group::find( $request->input('groupId') );
        $group->name = $request->input('groupName'); 

        $group->save(); 

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $class_id = $request->input('classId');
        Group::destroy($request->input('groupId'));
        
        return redirect()-> route('myclasses.groups.index', $class_id);  
    }

    public function searchGroups(Request $request, $class_id){
        $value = $request->get('search');
        $teachingClass = TeachingClass::find($class_id);
        $groups = $teachingClass->groups()
                    ->where('name','like','%'.$value.'%')
                    ->with('users')
                    ->with('responsible')
                    ->orderBy('created_at','desc')
                    ->get();
        $members = $teachingClass->students()->where('role', 'student')->get(); 
        
        if(Auth::user()->role == 'student'){
            return view('Student.groups',  [
                'groups'=>$groups,
                'teachingClass'=>$teachingClass, 
                'members'=>$members
            ]); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-groups', [
                'groups'=>$groups,
                'teachingClass'=>$teachingClass,
                'members'=>$members
            ]);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Mail\CollaborationMail;
use App\Mail\CustomMail;
use App\Mail\InvitationMail;
use App\TeachingClass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $teachingClass = TeachingClass::find($class_id);
        $members=$teachingClass->students; 
        $teachers=$teachingClass->students->where('role', 'teacher'); 
        
        if(Auth::user()->role == 'student'){
            return view('Student.members',  [
                'members'=>$members, 
                'teachingClass'=>$teachingClass, 
                'teachers'=>$teachers
            ]); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-members', [
                'members'=>$members, 
                'teachingClass'=>$teachingClass,
                'teachers'=>$teachers
        ]) ;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::user()->role == 'student'){
            return view('Student.profile'); 
        } 
        elseif (Auth::user()->role == 'teacher'){
            return view('Teacher.profile');
        }
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
    public function destroy($id, $class_id)
    {
        User::destroy($id);
        return redirect()-> route('myclasses.users.index'); 
    }


    /**
     * Invite teacher to co-teach a class
     *
     * @param Request $request
     * @param int $class_id
     */
    public function inviteTeacher(Request $request, $class_id){

        $this->validate($request, [
            'email'=>'required'
        ]);
        
        $destination = $request->input('email');
        $existingUser = DB::table('users')
                            ->select('id')
                            ->where('email',$destination)
                            ->first();

        if($existingUser){
            $details=[
                'senderName' => $request->input('senderName'),
                'senderEmail' => $request->input('senderEmail'), 
                'receiver_id' => $existingUser,
                'class_id' => $class_id                 
            ]; 

            Mail::to($destination)->send(new CollaborationMail($details));

        }else{
            $details=[
                'senderName' => $request->input('senderName'),
                'senderEmail' => $request->input('senderEmail'), 
                'class_id' => $class_id                 
            ]; 

            Mail::to($destination)->send(new InvitationMail($details));
        }

        return redirect()-> route('myclasses.members.index', $class_id);

    }


    /**
     * Sending email to member of the class
     *
     * @param Request $request
     * @param int $class_id
     * @return void
     */
    public function sendingEmail(Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);
        
        $destination= $request->input('destination');

        $details=[
            'senderName' => $request->input('senderName'),
            'senderEmail' => $request->input('senderEmail'), 
            'body' => $request->input('body')
        ];  

        Mail::to($destination)->send(new CustomMail($details));

        return redirect()->back();

    }

}

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
     * Edit the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user_information = User::find($user_id); 
        
        return view('Student.profile', [
            'information' => $user_information
        ]); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInformation(Request $request, $id)
    {
        $this->validate($request, [
            'email' =>['unique:users'],
        ]);

        $user = User::find($id); 

        $user->first_name= $request->input('first_name');
        $user->last_name= $request->input('last_name');
        $user->email= $request->input('email');
        $user->phone_number= $request->input('phone');

        $user->save();

        return redirect()->back();
    }

    /**
     * Update the password of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {       

        $user = User::find($id); 

        $user->password = $request->input('password');

        $user->save();

        return redirect()->back();

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

    public function searchStudents(Request $request, $class_id){
        $value = $request->get('search');
        $teachingClass = TeachingClass::find($class_id);
        $teachers=$teachingClass->students->where('role', 'teacher');
        $members = $teachingClass->students()
                    ->where('last_name','like','%'.$value.'%')
                    ->orderBy('created_at','desc')
                    ->paginate(8);
        if(Auth::user()->role == 'student'){
            return view('Student.members',[
                'members' => $members,
                'teachingClass' =>  $teachingClass,
                'teachers'=>$teachers,
            ]);
        }elseif(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-members',[
                'members' => $members,
                'teachingClass' =>  $teachingClass,
                'teachers'=>$teachers,
            ]);
        }
    }

}

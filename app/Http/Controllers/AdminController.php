<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function dashboard(){
        
        $nbClasses = DB::table('teaching_classes')->count();
        $nbStudents = DB::table('users')->where('role', 'student')->count();
        $nbTeachers = DB::table('users')->where('role', 'teacher')->count();

        return view('Admin.dashboard', [
            'nbClasses' => $nbClasses,
            'nbStudents' => $nbStudents,
            'nbTeachers' => $nbTeachers
            ]); 

    }
    
    public function classes(){
        
        $nbClasses = DB::table('teaching_classes')->count();
        $nbStudents = DB::table('users')->where('role', 'student')->count();
        $nbTeachers = DB::table('users')->where('role', 'teacher')->count();

        $teachingClasses=TeachingClass::all(); 

        return view('Admin.classes', [
            'teachingClasses' => $teachingClasses,
            'nbClasses' => $nbClasses,
            'nbStudents' => $nbStudents,
            'nbTeachers' => $nbTeachers
            ]); 

    }

    public function teachers(){
        
        $nbClasses = DB::table('teaching_classes')->count();
        $nbStudents = DB::table('users')->where('role', 'student')->count();
        $nbTeachers = DB::table('users')->where('role', 'teacher')->count();

        $teachers = User::where('role', 'teacher')->get(); 

        return view('Admin.teachers', [
            'teachers' => $teachers,
            'nbClasses' => $nbClasses,
            'nbStudents' => $nbStudents,
            'nbTeachers' => $nbTeachers
            ]); 

    }

    public function students(){
        
        $nbClasses = DB::table('teaching_classes')->count();
        $nbStudents = DB::table('users')->where('role', 'student')->count();
        $nbTeachers = DB::table('users')->where('role', 'teacher')->count();

        $students = User::where('role', 'student')->get(); 

        return view('Admin.students', [
            'students' => $students,
            'nbClasses' => $nbClasses,
            'nbStudents' => $nbStudents,
            'nbTeachers' => $nbTeachers
            ]); 

    }



}

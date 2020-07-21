<?php

namespace App\Http\Controllers;

use ZipArchive;
use File;
use App\Homework;
use Carbon\Carbon;
use App\Contribution;
use App\TeachingClass;
use Illuminate\Http\Request;
use App\ContributionDocument;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
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
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-contributions',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'contributions',
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.contributions',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'contributions',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(Contribution $contribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Contribution $contribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contribution_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contribution $contribution)
    {
        //
    }

    public function importContribution(Request $request, $homework_id){
        $request->validate([
            'contributions' => 'bail|required||max:2000',
            'contributions.*' => 'mimes:pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip'
        ]);
        if($request->hasFile('contributions')){
            //Find homework
            $homework = Homework::find($homework_id);
            //Get contribution
            $contribution = $homework->contributions()
                            ->where('user_id','=',Auth::user()->id)
                            ->first();
            $i = 0;
            foreach ($request->file('contributions') as $uploadedFile) {
                //
                $string = Auth::user()->first_name.'_'.Auth::user()->last_name.'_contribution_'.$contribution->id.'_'.++$i;
                $fileName = $string.'.'.$uploadedFile->extension();
                $folderName = $homework->title.'_'.$homework->id;
                //
                $uploadedFile->move(public_path().'/contribution_files/'.$folderName.'/', $fileName);
                //ContributionDocument instantiation
                $file = new ContributionDocument();
                $file->title = $fileName;
                //Database persistence
                $file->contribution()->associate($contribution)->save();
            }
            $contribution->status = 'Issued';
            $contribution->save();
            //Confirmation flash message 
            $request->session()->flash('contribution_imported', 
            'Contribution successfully imported. Remember that you can always edit your contribution before the deadline');
        }
        return redirect()->back();
    }

    //Delete contribution
    public function deleteContribution(Request $request, $homework_id,$contribution_id){
        $homework = Homework::find($homework_id);
        $contribution = Contribution::find($contribution_id);
        $files = $contribution->joinedDocuments;
        foreach ($files as $file) {
            $file_path = public_path().'/contribution_files/'.$homework->title.'_'.$homework->id.'/'.$file->title;
            unlink($file_path);
            $file->delete();
        }
        $contribution->status = 'Unissued';
        $contribution->save();
        $request->session()->flash('contribution_deleted', 'Contribution successfully deleted. Add new one before the deadline');
        return redirect()->back();
    }
    /**
     * Download contributions folder in zip format
     */
    public function downloadZipFolder($homework_id){
        $homework = Homework::find($homework_id);
        
        $zip = new ZipArchive;
        $zipFileName = $homework->title.'.zip';

        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('contribution_files/'.$homework->title.'_'.$homework->id));
   
            foreach ($files as $file) {
                $relativeNameInZipFile = basename($file);
                $zip->addFile($file, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    
        return response()->download(public_path($zipFileName));
    }

    /**
     * Functions for grades views
     */
    //Get grades view
    public function getGradesView($class_id){
        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks()
                    ->orderBy('created_at','desc')
                    ->paginate(8);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'grades',
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'grades',
            ]);
        }
    }

    //get gradesheets view
    public function getStudentsContributions($class_id,$homework_id){
        $teachingClass = TeachingClass::find($class_id);
        $students = $teachingClass->students()->where('role','student')
                    ->orderBy('last_name','asc')
                    ->paginate(8);
        $homework = Homework::find($homework_id);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-gradesheet',[
                'teachingClass' => $teachingClass,
                'students' => $students,
                'homework' => $homework,
                'active' => 'grades',
            ]);
        }
    }

    //grade contribution
    public function addGrade(Request $request, $contribution_id){
        $contribution = Contribution::find($contribution_id);
        
        $contribution->grade = $request->input('grade');
        $contribution->save();

        return redirect()->back();
    }

    /**
     * Search functions
     */

    //Search contributions
    public function searchContributions(Request $request, $class_id){
        $value = $request->get('search');

        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks()
                    ->where('title','like','%'.$value.'%')
                    ->orderBy('created_at','desc')
                    ->paginate(8);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-contributions',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'contributions',
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.contributions',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'contributions',
            ]);
        }
    } 

    //search grades
    public function searchGrades(Request $request, $class_id){
        $value = $request->get('search');

        $teachingClass = TeachingClass::find($class_id);
        $homeworks = $teachingClass->homeworks()
                    ->where('title','like','%'.$value.'%')
                    ->orderBy('created_at','desc')
                    ->paginate(8);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'grades',
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
                'active' => 'grades',
            ]);
        }
    }

    //Search students in gradesheet view
    public function searchStudentsGrades(Request $request, $class_id, $homework_id){
        $value = $request->get('search');

        $teachingClass = TeachingClass::find($class_id);
        $students = $teachingClass->students()
                    ->where([['role','student'],['last_name','like','%'.$value.'%']])
                    ->orderBy('last_name','asc')
                    ->paginate(8);
        $homework = Homework::find($homework_id);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-gradesheet',[
                'teachingClass' => $teachingClass,
                'students' => $students,
                'homework' => $homework,
                'active' => 'grades',
            ]);
        }
    }
}
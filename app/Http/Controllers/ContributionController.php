<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Homework;
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
        $homework = Homework::find($homework_id);
        if($request->hasFile('contributions')){
            //Contribution instantiation
            $contribution = new Contribution();
            //
            $contribution->title = $homework->title;
            $contribution->user_id = Auth::user()->id;
            $contribution->homework()->associate($homework)->save();
            $idContribution = $contribution->id;
            $i = 0;
            foreach ($request->file('contributions') as $uploadedFile) {
                //
                $string = Auth::user()->first_name.'_'.Auth::user()->last_name.'_contribution_'.$idContribution.'_'.++$i;
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
            //Confirmation flash message 
            $request->session()->flash('contribution_imported', 'Contribution successfully imported');
        }
        return redirect()->back();
    }

    public function downloadZipFolder($homework_id){
        $homework = Homework::find($homework_id);

        //$files = glob(public_path('contribution_files/'.$homework->title.'/*.*'));
        //dd($files);
        //$files = glob(public_path().'/contribution_files/'.$homework->title.'/*.png');

        //dd(glob(public_path('contribution_files/'.$homework->title.'/*')));

        $file = public_path().'/homework_files/oop-mPBFKo.jpeg';
        dd($file);
        /*$public_dir = public_path().'/zipFiles';
        $zip = new ZipArchive;
        $zipFileName = $homework->title.Carbon::now().'.zip';
   
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {  
            foreach ($files as $file) {
                $zip->addFile($file, basename($file)); 
            }    
            $zip->close();
        }

        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );

        $filetopath = $public_dir.'/'.$zipFileName;
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }*/

        /*if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE){
            $files = glob(public_path('folder/*')'/contribution_files/'.$homework->title.'/*')
            $files = File::files(public_path().'/contribution_files/'.$homework->title.'/*');
            foreach ($files as $file) {
                $zip->addFile($file);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));*/
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
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
            ]);
        }
    }

    //get gradesheets view
    public function getStudentsContributions($class_id,$homework_id){
        $teachingClass = TeachingClass::find($class_id);
        $students = $teachingClass->students()
                    ->orderBy('last_name','asc')
                    ->paginate(8);
        $homework = Homework::find($homework_id);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-gradesheet',[
                'teachingClass' => $teachingClass,
                'students' => $students,
                'homework' => $homework,
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
            ]);
        }else if(Auth::user()->role == 'student'){
            return view('Student.grades',[
                'teachingClass' => $teachingClass,
                'homeworks' => $homeworks,
            ]);
        }
    }

    //Search students in gradesheet view
    public function searchStudentsGrades(Request $request, $class_id, $homework_id){
        $value = $request->get('search');

        $teachingClass = TeachingClass::find($class_id);
        $students = $teachingClass->students()
                    ->where('last_name','like','%'.$value.'%')
                    ->orderBy('last_name','asc')
                    ->paginate(8);
        $homework = Homework::find($homework_id);
        if(Auth::user()->role == 'teacher'){
            return view('Teacher.teacher-gradesheet',[
                'teachingClass' => $teachingClass,
                'students' => $students,
                'homework' => $homework,
            ]);
        }
    }
}
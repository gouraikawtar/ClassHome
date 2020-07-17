<?php

namespace App\Http\Controllers;

use App\TeachingClass;
use App\ClassSubscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class TeachingClassController extends Controller
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
    //Get the 'My Classes' view based on currently authenticated user's role
    public function index()
    {
        //if it's a student
        if(Auth::user()->role == 'student'){
            //find its subscriptions
            $subscriptions = Auth::user()->subscriptions()
                            ->orderBy('created_at','desc')
                            ->paginate(9);
            return view('Student.dashboard', [
                'classes' => $subscriptions,
                'active' => 'index',
                /* the 'active' parameter is about to define whether
                 * the tab should be active or no
                 */
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            $teacher = Auth::user();
            //find its created classes
            $classes = $teacher->teachingClasses()
                        ->orderBy('created_at','desc')
                        ->paginate(9);
            //$classes = TeachingClass::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(9);
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
    //Create TeachingClass using AJAX validation
    public function store(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required||max:50',
            'section' => 'required',
            'object' => 'max:100',
            'description' => 'max:100',
        ]);

        //if validation fails
        if($validator->fails()){
            //return errors on json format
            return response()->json(['errors' => $validator->errors()]);
        }else{
            //if validation passes

            //instantiate new teachingClass object
            $class = new TeachingClass();

            //fill it with inputs values
            $class->name = $request->input('name');
            $class->section = $request->input('section');
            $class->object = $request->input('object');
            $class->description = $request->input('description');
            $class->code = Str::random(6);
            $class->user_id = Auth::user()->id;

            //save it to DB
            $class->save();
            //return a json success response
            return response()->json(['success' => '1']);
        }
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
    //Open the edit information view
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
    //Update TeachingClass information
    public function update(Request $request, $class_id)
    {
        //inputs validation
        $request->validate([
            'class_name' => 'bail|required||max:50',
            'class_section' => 'required',
            'class_object' => 'max:100',
            'class_desc' => 'max:100',
        ]);
        
        //if the validation passes, we will find the appropriate teachingClass
        $teachingClass = TeachingClass::find($class_id);

        //and update its information values
        $teachingClass->name = $request->input('class_name');
        $teachingClass->section = $request->input('class_section');
        $teachingClass->object = $request->input('class_object');
        $teachingClass->description = $request->input('class_desc');

        //save the update
        $teachingClass->save();
        //flash message & redirect
        $request->session()->flash('info_edited', 'Class information edited successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeachingClass  $teachingClass
     * @return \Illuminate\Http\Response
     */

    //Archive a class
    public function destroy(Request $request, $class_id)
    {
        //find the appropriate class
        $teachingClass = TeachingClass::find($class_id);
        //delete it
        $teachingClass->delete();
        //find its subscriptions
        $subs = ClassSubscription::where('teaching_class_id','=',$class_id)->get();
        //delete them one by one
        foreach ($subs as $sub) {
            $sub->delete();
        }
        //flash message & redirect
        $request->session()->flash('class_archived','Class archived successfully');
        return redirect()->back();
    }

    //Get the archive classes view based on current authenticated user's role
    public function archive(){
        //if the current authenticated user is a student
        if(Auth::user()->role == 'student'){
            //get its archived subscriptions
            $subs = ClassSubscription::onlyTrashed()->where('user_id','=',Auth::user()->id)->get();
            //instantiate an ampty collection to store the archived classes
            $archivedClasses = Collection::make();
            foreach ($subs as $sub) {
                //find the appropriate archived class using the 'teaching_class_id' from the sub
                $class = TeachingClass::onlyTrashed()->find($sub->teaching_class_id);
                //add the class to the collection
                $archivedClasses->add($class);
            }

            return view('Student.archive', [
                'archivedClasses' => $archivedClasses->paginate(9),
                'active' => 'archive',
                /* the 'active' parameter is about to define whether
                 * the tab should be active or no
                 */
            ]);

        //if the current authenticated user is a teacher
        }elseif(Auth::user()->role == 'teacher'){
            //get its archived classes
            $archivedClasses = TeachingClass::onlyTrashed()->where('user_id',Auth::user()->id)->paginate(9);
            
            return view('Teacher.teacher-archive',[
                'archivedClasses' => $archivedClasses,
                'active' => 'archive',
                /* the 'active' parameter is about to define whether
                * the tab should be active or no
                */
            ]);
        }
    }

    //Restore an archived class
    public function restore(Request $request, $class_id){
        //find the appropriate archived class
        $archivedClass = TeachingClass::onlyTrashed()
                        ->where('id',$class_id)
                        ->first();
        //restore it
        $archivedClass->restore();
        //find its subscriptions
        $subs = ClassSubscription::onlyTrashed()->where('teaching_class_id','=',$class_id)->get();
        //restore them one by one
        foreach ($subs as $sub) {
            $sub->restore();
        }
        //flash message & redirect
        $request->session()->flash('class_restored','Class restored successfully');
        return redirect()->back();
    }

    //Force delete an archived class
    public function forcedelete(Request $request, $class_id){
        //find the appropriate archived class
        $archivedClass = TeachingClass::onlyTrashed()
                        ->where('id',$class_id)
                        ->first();
        //delete it
        $archivedClass->forceDelete() ;
        //look for its subscriptions
        $subs = ClassSubscription::onlyTrashed()->where('teaching_class_id','=',$class_id)->get();
        //delete them one by one
        foreach ($subs as $sub) {
            $sub->forceDelete();
        }
        //flash message & redirect
        $request->session()->flash('class_deleted','Class deleted successfully');
        return redirect()->back();
    }

    // Exit class for students
    public function exitClass(Request $request, $class_id){
        //find the appripriate subscription
        $sub = ClassSubscription::where('teaching_class_id','=',$class_id)->first();
        //delete it
        $sub->forcedelete();
        //flash message & redirect
        $request->session()->flash('exit','Class exited successfully');
        return redirect()->back();
    }

    //Reset TeachingClass code
    public function resetCode(Request $request, $class_id){
        //find the appropriate teachingClass
        $teachingClass = TeachingClass::find($class_id);
        //reset the code
        $teachingClass->code = Str::random(6);
        //save changes
        $teachingClass->save();
        //flash message & redirect
        $request->session()->flash('code_reset', 'Code reset successfully');
        return redirect()->back();
    } 

    //Search TeachingClasses
    public function searchTeachingClasses(Request $request){
        $value = $request->get('search');

        //if it's a student
        if(Auth::user()->role == 'student'){
            //find its subscriptions
            $subscriptions = Auth::user()->subscriptions()->where('name','like','%'.$value.'%')
                            ->orderBy('created_at','desc')
                            ->paginate(9);
            return view('Student.dashboard', [
                'classes' => $subscriptions,
                'active' => 'index',
                /* the 'active' parameter is about to define whether
                 * the tab should be active or no
                 */
            ]);

        //if it's a teacher
        }elseif(Auth::user()->role == 'teacher'){
            $teacher = Auth::user();
            //find its created classes
            $classes = $teacher->teachingClasses()
                        ->orderBy('created_at','desc')->where('name','like','%'.$value.'%')
                        ->paginate(9);
            return view('Teacher.teacher-myclasses',[
                'classes' => $classes,
                'active' => 'index', 
                /* the 'active' parameter is about to define whether
                 * the tab should be active or no
                 */
            ]);
        }
    }

    //Search Archived classes for teacher user only
    public function searchArchivedClasses(Request $request){
        $value = $request->get('search');

        //if the current authenticated user is a teacher
        if(Auth::user()->role == 'teacher'){
            //get its archived classes
            $archivedClasses = TeachingClass::onlyTrashed()
                            ->where([['user_id',Auth::user()->id],['name','like','%'.$value.'%']])
                            ->paginate(9);
            
            return view('Teacher.teacher-archive',[
                'archivedClasses' => $archivedClasses,
                'active' => 'archive',
                /* the 'active' parameter is about to define whether
                * the tab should be active or no
                */
            ]);
        }
    }
}
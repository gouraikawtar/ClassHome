<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeworkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts','PostController')-> only(['index', 'store', 'update', 'destroy']); 

Route::resource('/comments','CommentController') -> only(['store', 'destroy']); 

Route::resource('/users','UserController') -> only(['index', 'show', 'update', 'destroy']); 

Route::resource('/groups','GroupController') -> only(['index', 'store', 'update', 'destroy']); 



// ------------------------------------ Temporary Routes---------------------------------
Route::get('/library', function () { return view('Teacher.teacher-library');});
Route::get('/settings', function () {return view('Teacher.teacher-settings');}); 
//Route::get('/myclasses', function () { return view('Teacher.teacher-myclasses');});
//Route::get('/dashboard', function () { return view('Student.dashboard'); });
Route::get('/contributions', function () {return view('Teacher.teacher-contributions');});
Route::get('/grades', function () {return view('Teacher.teacher-grades');});
//----------------------------------------------------------------------------------------

//------------------------------ Routes for Authentification----------------------------
Auth::routes();
//--------------------------------------------------------------------------------------


//------------------------ Routes for TeachingClassController------------------------------
Route::get('/archive','TeachingClassController@archive')->name('myclasses.archive');
Route::delete('/archive/{class_id}/delete','TeachingClassController@forcedelete');
Route::patch('/archive/{class_id}/restore','TeachingClassController@restore');
Route::patch('/code/{class_id}/reset','TeachingClassController@resetCode');
Route::resource('/myclasses','TeachingClassController')->except(['create','show']);
//-----------------------------------------------------------------------------------------

//----------------------------Routes for HomeworkController---------------------------------
Route::resource('/myclasses.homeworks','HomeworkController')->only(['index','store','update','destroy','show']);
Route::get('/download/{name}','HomeworkController@downloadFile')->name('homeworks.download');
//------------------------------------------------------------------------------------------

/**---------------------------- Route for ClassSubscriptionController ---------------------------------*/
Route::post('/join','ClassSubscriptionController@joinClass');
/**------------------------------------------------------------------------------------------*/

/**----------------------------- Routes for ContributionController ------------------------- */
Route::resource('/myclasses.contributions', 'ContributionController')->only(['index']);
Route::post('/import/{homework_id}','ContributionController@importContribution');
//Route::get('/donwload-contributions/{homework_id}','ContributionController@downloadZipFolder')->name('contributions.download');
/**----------------------------------------------------------------------------------------- */
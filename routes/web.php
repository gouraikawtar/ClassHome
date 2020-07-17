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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('index');
})->middleware('guest');

Route::resource('/posts','PostController')-> only(['index', 'store', 'update', 'destroy']); 

Route::resource('/comments','CommentController') -> only(['store', 'destroy']); 

Route::resource('/users','UserController') -> only(['index', 'show', 'update', 'destroy']); 

Route::resource('/groups','GroupController') -> only(['index', 'store', 'update', 'destroy']); 



// ------------------------------------ Temporary Routes---------------------------------
Route::get('/library', function () { return view('Teacher.teacher-library');});
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
Route::delete('/myclasses/{class_id}/exit','TeachingClassController@exitClass');
Route::get('/myclasses/myclasses-search','TeachingClassController@searchTeachingClasses')->name('myclasses.search');
Route::get('/archive/archive-search','TeachingClassController@searchArchivedClasses')->name('archive.search');
//-----------------------------------------------------------------------------------------

//----------------------------Routes for HomeworkController---------------------------------
Route::resource('/myclasses.homeworks','HomeworkController')->only(['index','store','update','destroy','show','edit']);
Route::get('/download/{name}','HomeworkController@downloadFile')->name('homeworks.download');
Route::get('/myclasses/{class_id}/homeworks-search','HomeworkController@searchHomeworks')->name('homeworks.search');
//------------------------------------------------------------------------------------------

/**---------------------------- Route for ClassSubscriptionController ---------------------------------*/
Route::post('/join','ClassSubscriptionController@joinClass');
/**------------------------------------------------------------------------------------------*/

/**----------------------------- Routes for ContributionController ------------------------- */
Route::resource('/myclasses.contributions', 'ContributionController')->only(['index']);
Route::put('/import/{homework_id}','ContributionController@importContribution');
Route::put('/delete/{homework_id}/contribution/{contribution_id}', 'ContributionController@deleteContribution');
Route::get('/myclasses/{class_id}/grades','ContributionController@getGradesView')->name('grades');
Route::get('/myclasses/{class_id}/grading/{homework_id}','ContributionController@getStudentsContributions')->name('grading');
Route::put('/grading/{contribution_id}','ContributionController@addGrade');
Route::get('/donwload-contributions/{homework_id}','ContributionController@downloadZipFolder')->name('contributions.download');
Route::get('/myclasses/{class_id}/grades-search','ContributionController@searchGrades')->name('grades.search');
Route::get('/myclasses/{class_id}/grading/{homework_id}/search','ContributionController@searchStudentsGrades')->name('gradesheet.search');
Route::get('/myclasses/{class_id}/contributions-search','ContributionController@searchContributions')->name('contributions.search');
/**----------------------------------------------------------------------------------------- */
/**----------------------------- Routes for HomeworkDocumentController ------------------------- */
Route::resource('/myclasses.homeworks.documents','HomeworkDocumentController')->only(['destroy']);
/**----------------------------------------------------------------------------------------- */
Route::resource('/myclasses.library', 'LibraryController')->only(['index']);
Route::get('/myclasses/{class_id}/library-search','LibraryController@searchDocuments')->name('library.search');
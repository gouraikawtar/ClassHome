<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeworkController;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
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

Route::middleware('auth')->group(function() {
    Route::resource('/myclasses.posts','PostController')-> only(['index', 'store']); 
    Route::post('/editPost', 'PostController@update')->name('editPost');
    Route::post('/deletePost', 'PostController@destroy')->name('deletePost');
    Route::get('/FileDownload/{name}','PostController@downloadFile')->name('files.download');

});

Route::middleware('auth')->group(function() {
    Route::resource('/myclasses.comments', 'CommentController') -> only('store');
    Route::post('/deleteComment', 'CommentController@destroy')->name('deleteComment');
});

Route::middleware('auth')->group(function() {
    Route::resource('/myclasses.members', 'UserController') -> only(['index', 'destroy']);
    Route::get('/profile/{user_id}', 'UserController@edit')->name('profile');
    Route::put('/updateInformation/{user_id}', 'UserController@updateInformation')->name('updateInformation');
    Route::put('/updatePassword/{user_id}', 'UserController@updatePassword')->name('updatePassword');
    Route::get('/myclasses/{class}/invitation', 'UserController@inviteTeacher')->name('invitation');
    Route::get('/sendingEmail', 'UserController@sendingEmail')->name('sendingEmail');
});

Route::middleware('auth')->group(function() {
    Route::resource('/myclasses.groups', 'GroupController') -> only(['index', 'store']);
    Route::post('/deleteGroup', 'GroupController@destroy')->name('deleteGroup');
    Route::post('/updateName', 'GroupController@updateName')->name('updateName');
});


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
Route::delete('/myclasses/{class_id}/exit','TeachingClassController@exitClass');
//-----------------------------------------------------------------------------------------

//----------------------------Routes for HomeworkController---------------------------------
Route::resource('/myclasses.homeworks','HomeworkController')->only(['index','store','update','destroy','show','edit']);
Route::get('/download/{name}','HomeworkController@downloadFile')->name('homeworks.download');
//------------------------------------------------------------------------------------------

/**---------------------------- Route for ClassSubscriptionController ---------------------------------*/
Route::post('/join','ClassSubscriptionController@joinClass');
Route::post('/collaborate','ClassSubscriptionController@collaborate')->name('collaboration'); 
Route::post('/deleteMember', 'ClassSubscriptionController@deleteMember')->name('deleteMember');
/**------------------------------------------------------------------------------------------*/

/**----------------------------- Routes for ContributionController ------------------------- */
Route::resource('/myclasses.contributions', 'ContributionController')->only(['index']);
Route::post('/import/{homework_id}','ContributionController@importContribution');
Route::get('/myclasses/{class_id}/grades','ContributionController@getGradesView')->name('grades');
Route::get('/myclasses/{class_id}/grading/{homework_id}','ContributionController@getStudentsContributions')->name('grading');
Route::put('/grading/{contribution_id}','ContributionController@addGrade');
Route::get('/donwload-contributions/{homework_id}','ContributionController@downloadZipFolder')->name('contributions.download');
/**----------------------------------------------------------------------------------------- */
/**----------------------------- Routes for HomeworkDocumentController ------------------------- */
Route::resource('/myclasses.homeworks.documents','HomeworkDocumentController')->only(['destroy']);

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

Route::get('/email', function () { return view('emails.collaboration'); });

Route::resource('/myclasses.posts','PostController')-> only(['index', 'store']); 
Route::post('/editPost', 'PostController@update')->name('editPost');
Route::post('/deletePost', 'PostController@destroy')->name('deletePost');
Route::get('/FileDownload/{name}','PostController@downloadFile')->name('files.download');

Route::resource('/myclasses.comments','CommentController') -> only('store'); 
Route::post('/deleteComment', 'CommentController@destroy')->name('deleteComment');

Route::resource('/myclasses.members','UserController') -> only(['index', 'update', 'destroy']); 
Route::get('/profile', 'UserController@show')->name('profile');
Route::get('/myclasses/{class}/invitation', 'UserController@inviteTeacher')->name('invitation'); 
Route::get('/sendingEmail', 'UserController@sendingEmail')->name('sendingEmail'); 

Route::resource('/myclasses.groups','GroupController') -> only(['index', 'store', 'update']); 
Route::post('/deleteGroup', 'GroupController@destroy')->name('deleteGroup');


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
Route::post('/join','ClassSubscriptionController@joinClass');
Route::post('/collaborate','ClassSubscriptionController@collaborate')->name('collaboration'); 
Route::post('/deleteStudent', 'ClassSubscriptionController@deleteStudent')->name('deleteStudent');
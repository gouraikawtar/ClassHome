<?php

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

/*Route::resource('/posts','PostController'); 

Route::resource('/comments','CommentController'); 

Route::resource('/contributions','ContributionController'); 

Route::resource('/documents','DocumentController'); 

Route::resource('/groups','GroupController'); 

Route::resource('/homeworks','HomeworkController'); 

Route::resource('/profile','ProfileController'); 

Route::resource('/teachingClasses','TeachingClassController'); */


Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/backup', function () {
    return view('backup-password');
});
// Route::get('/myclasses', function () {
//     return view('Teacher.teacher-myclasses');
// });
Route::get('/archive', function () {
    return view('Teacher.teacher-archive');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/contributions', function () {
    return view('Teacher.teacher-contributions');
});
Route::get('/grades', function () {
    return view('Teacher.teacher-grades');
});
Route::get('/groups', function () {
    return view('Teacher.teacher-groups');
});
// Route::get('/homework', function () {
//     return view('Teacher.teacher-homework');
// });
Route::get('/library', function () {
    return view('Teacher.teacher-library');
});
Route::get('/members', function () {
    return view('Teacher.teacher-members');
});
Route::get('/posts', function () {
    return view('Teacher.teacher-posts');
});
Route::get('/settings', function () {
    return view('Teacher.teacher-settings');
});

Route::resource('myclasses','TeachingClassController')->only(['index','store']);
Route::resource('homeworks','HomeworkController')->only(['index','store','update','destroy','show']);
Route::get('download/{name}','HomeworkController@downloadFile')->name('homeworks.download');
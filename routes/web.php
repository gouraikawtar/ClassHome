<?php

use Illuminate\Support\Facades\Auth;
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

// Route::resource('/homeworks','HomeworkController'); 

// Route::resource('/profile','ProfileController'); 

// Route::resource('/teachingClasse','TeachingClassController'); 

//Route::get('/Studentposts', function () {return view('Student.posts');});


Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/backup', function () {
    return view('backup-password');
});
Route::get('/myclasses', function () {
    return view('teacher-myclasses');
});
Route::get('/archive', function () {
    return view('teacher-archive');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/contributions', function () {
    return view('teacher-contributions');
});
Route::get('/grades', function () {
    return view('teacher-grades');
});

Route::get('/homework', function () {
    return view('teacher-homework');
});
Route::get('/library', function () {
    return view('teacher-library');
});
Route::get('/members', function () {
    return view('teacher-members');
});

Route::get('/settings', function () {
    return view('teacher-settings');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myclasses', function () {
    return view('teacher-myclasses');
});

Route::get('/dashboard', function () {
    return view('Student.dashboard');
});
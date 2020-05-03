<?php

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
Route::get('/groups', function () {
    return view('teacher-groups');
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
Route::get('/posts', function () {
    return view('teacher-posts');
});
Route::get('/settings', function () {
    return view('teacher-settings');
});
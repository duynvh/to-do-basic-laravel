<?php

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
    return view('app');
});

Route::model('tasks', 'App\Task');
Route::model('projects', 'App\Project');

Route::bind('tasks', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});

Route::bind('projects', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});

Route::resource('projects', 'ProjectsController');

//Route::resource('tasks', 'TasksController');

Route::resource('projects.tasks', 'TasksController');


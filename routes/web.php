<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Str;
use \Illuminate\Support\Facades\Response;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires', 'QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','QuestionnaireController@show');

Route::get('/questionnaires/{questionnaire}/questions/create','QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions','QuestionController@store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}','QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');

//Macros
Route::get('/macros', function (){
    dd(Str::partNumber('43243242'));
});
Route::get('/macros2', function (){
    return Response::errorJson('A huge error occured. Boom!');
});

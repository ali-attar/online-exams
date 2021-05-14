<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\classController;
use App\Http\Controllers\quizController;
use App\Http\Controllers\studentController;

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


Route::view('/', 'welcome');

Route::post('/permision', [adminController::class,'permision'])->name('permision');

Route::view('/permision', 'admin.permision')->name('permision_view');

Route::view('/home', 'welcome')->name('home');

Route::view('/home/users', 'admin.users')->name('users');

Route::get('/home/users/change/{id}',[adminController::class, 'changeUserpage'])->name('page_change_user');

Route::post('/home/users/change/{id}', [adminController::class, 'changeUser'])->name('change_user');

Route::get('/home/users/change/{id}/{per}', [adminController::class, 'deletePermisionUser'])->name('deletePermisionUser');

Route::get('/home/users/del/{id}', [adminController::class, 'deleteUser'])->name('delete_user');

Route::get('/class', [classController::class, 'class'])->name('class');

Route::view('/class/create', 'manager.createClass')->name('create_class_view');

Route::post('/class/create', [classController::class ,'create'])->name('create_class');

Route::get('/class/{id}/users', [classController::class,'users'])->name('class_users');

Route::get('/class/{id}/users/add', [classController::class,'users_add'])->name('class_add_user_view');

Route::post('/class/{id}/users/add', [classController::class,'users_adding'])->name('class_add_user');

Route::get('/class/{id}/users/{user}', [classController::class,'delete_user'])->name('delete_user_class');

Route::get('/class/{id}/del', [classController::class,'delete_class'])->name('delete_class');

Route::view('/exam/create', 'quiz.create_quiz')->name('create_quiz');

Route::post('/exam/create', [quizController::class,'create_quiz'])->name('create_quiz_set');

Route::get('/exam', [quizController::class,'quiz_sets'])->name('quiz_sets');

Route::get('/exam/{id}', [quizController::class,'question'])->name('question_view');

Route::get('/exam/{id}/sets', [quizController::class,'question_set_view'])->name('question_set_view');

Route::post('/exam/{id}/sets', [quizController::class,'question_set'])->name('question_set');

Route::get('/exam/{id}/option/{id_question}', [quizController::class,'add_option_view'])->name('add_option_view');

Route::post('/exam/{id}/option/{id_question}', [quizController::class,'add_option'])->name('add_option');

Route::get('/exam/{id}/optiondel/{id_option}', [quizController::class,'del_option'])->name('del_option');

Route::get('/exam/{id}/questiondel/{id_question}', [quizController::class,'del_question'])->name('del_question');

Route::get('/examdel/{id}', [quizController::class,'del_exam'])->name('del_exam');

Route::get('/exam/{id}/editquestion/{id_question}', [quizController::class,'edit_question_view'])->name('edit_question_view');

Route::post('/exam/{id}/editquestion/{id_question}', [quizController::class,'edit_question'])->name('edit_question');

Route::get('/exam/{id}/edit', [quizController::class,'edit_exam_view'])->name('edit_exam_view');

Route::post('/exam/{id}/edit', [quizController::class,'edit_exam'])->name('edit_exam');

Route::get('/exam/{id}/class', [quizController::class,'exam_class'])->name('exam_class');

Route::get('/exam/{id}/addClass', [quizController::class,'add_exam_class_view'])->name('add_exam_class_view');

Route::post('/exam/{id}/addClass', [quizController::class,'add_exam_class'])->name('add_exam_class');

Route::get('/exam/{id}/classusers/{class_id}', [quizController::class,'exam_class_users'])->name('exam_class_users');

Route::get('/exam/{id}/delclass/{class_id}', [quizController::class,'exam_class_del'])->name('exam_class_del');

Route::get('/exams', [studentController::class,'which_exams'])->name('which_exams');

Route::get('/exams/{id}', [studentController::class,'exams_view'])->name('exams_view');

Route::post('/exams/{id}', [studentController::class,'exams_submit'])->name('exams_submit');

Route::get('/exams/{id}/result', [studentController::class,'exam_result'])->name('exams_result');

Route::get('/exampdf/create', [quizController::class,'exam_pdf_create'])->name('exam_pdf_create');

Auth::routes();


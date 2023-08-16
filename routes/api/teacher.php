<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\Route;

Route::group([ 'middleware' => 'user:teacher'], function ($router) {

      ################################# start  Get class  ###################################
    Route::get('/get_classes', [LessonController::class, 'get_class']);
      ################################# end Get class  ###################################

    ################################# start  Get section  ###################################
    Route::get('/get_sections', [LessonController::class, 'get_section']);
    ################################# end Get section  ###################################

    ################################# start  Get subject  ###################################
    Route::get('/get_subject', [LessonController::class, 'get_subject']);
    ################################# end Get subject  ###################################
    
    ################################# start  Get subject  ###################################
    Route::get('/get_subject', [LessonController::class, 'get_subject']);
    ################################# end Get subject  ###################################

    ################################# start  Get lesson  ###################################
    Route::get('/get_lesson', [LessonController::class, 'get_lesson']);
    ################################# end Get lesson  ###################################

    ################################# start  create lesson  ###################################
    Route::post('/create_lesson', [LessonController::class, 'create']);
    ################################# end create lesson  ###################################

    ################################# start  create lesson  ###################################
    Route::delete('/delete_lesson', [LessonController::class, 'destroy']);
    ################################# end create lesson  ###################################

    ################################# start   get timetable  ###################################
    Route::get('/Get_Schedule', [TimeTableController::class, 'get_time_for_tracher']);
    ################################# end get timetable  ###################################

    ################################# start   get student  ###################################
    Route::get('/Get_Students', [StudentController::class, 'get_student']);
    ################################# end get student  ###################################

    ################################# start   create note ###################################
    Route::post('/create_note', [NoteController::class, 'create']);
    ################################# end create note  ###################################

    ################################# start   show note  ###################################
    Route::get('/show_note', [NoteController::class, 'show']);
    ################################# end show note  ###################################

    ################################# start   delete note  ###################################
    Route::delete('/delete_note', [NoteController::class, 'destroy']);
    ################################# end delete note  ###################################


    ################################# start   show note  ###################################
    Route::get('/show_accountant_teacher', [StudentAccountController::class,'account_statement_teacher_api']);
    ################################# end show note  ###################################

});
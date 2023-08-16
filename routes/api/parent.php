<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StudentAccountController;
use Illuminate\Support\Facades\Route;


Route::group([ 'middleware' => 'user:parent'], function ($router) {

    ################################# start   show note  ###################################
    Route::get('/show_note_For_parent', [NoteController::class, 'show_parent']);
    ################################# end show note  ###################################

    ################################# start   show note  ###################################
    Route::get('/show_accountant', [StudentAccountController::class, 'account_statement_api']);
    ################################# end show note  ###################################

});
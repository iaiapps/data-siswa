<?php

use App\Http\Controllers\ConstitutionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScoreCollectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\SubjectController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class);

        // group
        Route::resource('group', GroupController::class);
        Route::get('showstudentgroup/{id}', [GroupController::class, 'showstudentgroup'])->name('showstudentgroup');
        Route::get('addstudentgroup/{id}', [GroupController::class, 'addstudentgroup'])->name('addstudentgroup');
        Route::put('studentgroup', [GroupController::class, 'storestudentgroup'])->name('storestudentgroup');

        Route::resource('student', StudentController::class);
        Route::resource('studentparent', StudentParentController::class);
        Route::resource('subject', SubjectController::class);

        // foto/document
        Route::get('uploadfoto/{id}', [DocumentController::class, 'create'])->name('uploadfoto');
        Route::post('uploadfoto', [DocumentController::class, 'store'])->name('storefoto');
        Route::get('view_foto/{document}', [DocumentController::class, 'show'])->name('viewfoto');
        Route::delete('view_foto/{document}', [DocumentController::class, 'destroy'])->name('deletefoto');

        // kumpulan nilai
        Route::resource('scorecollection', ScoreCollectionController::class);
    });

    Route::middleware('role:siswa')->group(function () {
        Route::get('biodata', [StudentController::class, 'biodata'])->name('biodata');
        // Route::get('/biodata/{biodata}', [Siswa::class, 'bio_form'])->middleware('auth');
    });
});

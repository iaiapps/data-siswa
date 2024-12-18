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
use App\Http\Controllers\YearController;
use App\Models\ScoreCollection;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // admin
    Route::middleware('role:admin')->group(function () {
        // akun user
        Route::resource('user', UserController::class);
        Route::put('resetpass/{id}', [UserController::class, 'resetpass'])->name('reset.pass');
        // siswa
        Route::resource('student', StudentController::class);

        // kelas
        Route::resource('group', GroupController::class);
        Route::get('showstudentgroup/{id}', [GroupController::class, 'showstudentgroup'])->name('showstudentgroup');
        Route::get('addstudentgroup/{id}', [GroupController::class, 'addstudentgroup'])->name('addstudentgroup');
        Route::put('studentgroup', [GroupController::class, 'storestudentgroup'])->name('storestudentgroup');

        // pelajaran
        Route::resource('subject', SubjectController::class);

        // tahun pelajaran
        Route::resource('year', YearController::class);
        Route::get('showstudentyear/{id}', [YearController::class, 'showstudentyear'])->name('showstudentyear');
        Route::get('addstudentyear/{id}', [YearController::class, 'addstudentyear'])->name('addstudentyear');
        Route::put('studentyear', [YearController::class, 'storestudentyear'])->name('storestudentyear');

        // kumpulan nilai
        Route::get('scorecollection', [ScoreCollectionController::class, 'index'])->name('scorecollection.index');
        Route::get('scorecollection/create', [ScoreCollectionController::class, 'create'])->name('scorecollection.create');
        Route::post('scorecollection', [ScoreCollectionController::class, 'store'])->name('scorecollection.store');
        Route::get('scorecollection/{id}', [ScoreCollectionController::class, 'show'])->name('scorecollection.show');
        Route::get('scorecollection/{scoreCollection}/edit', [ScoreCollectionController::class, 'edit'])->name('scorecollection.edit');
        Route::put('scorecollection/{scoreCollection}', [ScoreCollectionController::class, 'update'])->name('scorecollection.update');
    });
    // admin and siswa
    Route::middleware('role:admin|siswa')->group(function () {
        // ortu siswa
        Route::resource('studentparent', StudentParentController::class)->except('index');

        // foto/document
        Route::get('uploadfoto/{id}', [DocumentController::class, 'create'])->name('uploadfoto');
        Route::post('uploadfoto', [DocumentController::class, 'store'])->name('storefoto');
        Route::get('view_foto/{document}', [DocumentController::class, 'show'])->name('viewfoto');
        Route::delete('view_foto/{document}', [DocumentController::class, 'destroy'])->name('deletefoto');
    });
    // siswa
    Route::middleware('role:siswa')->group(function () {
        // biodata siswa
        Route::get('biodata', [StudentController::class, 'biodata'])->name('biodata.index');
        Route::get('/biodata/{id}', [StudentController::class, 'biodataEdit'])->name('biodata.edit');
        Route::put('/biodata/{biodata}', [StudentController::class, 'biodataStore'])->name('biodata.update');
        // change password
        Route::get('/change-password', [UserController::class, 'changePassword'])->name('password.change');
        Route::put('/change-password/{pass}', [UserController::class, 'editPassword'])->name('password.edit');
    });
});

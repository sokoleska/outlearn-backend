<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;


use App\Http\Controllers\AdminCoursesController;
use App\Http\Controllers\AdminModulesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function(){
    return view('admin.login');
});



Route::get('/admin/dashboard',[AdminCoursesController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/courses', [AdminCoursesController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [AdminCoursesController::class, 'create'])->name('courses.create');
    Route::post('/courses', [AdminCoursesController::class, 'store'])->name('courses.store'); // Fix here
    Route::get('/courses/{course}/edit', [AdminCoursesController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [AdminCoursesController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [AdminCoursesController::class, 'destroy'])->name('courses.destroy');
    Route::get('/courses/{course}', [AdminCoursesController::class, 'show'])->name('courses.show');

});

Route::prefix('admin/modules')->group(function () 
{
    Route::get('/', [AdminModulesController::class, 'index'])->name('admin.modules.index');
    Route::get('/create', [AdminModulesController::class, 'create'])->name('admin.modules.create');
    Route::post('/', [AdminModulesController::class, 'store'])->name('admin.modules.store');
    Route::get('/{module}/edit', [AdminModulesController::class, 'edit'])->name('admin.modules.edit');
    Route::put('/{module}', [AdminModulesController::class, 'update'])->name('admin.modules.update');
    Route::delete('/{module}', [AdminModulesController::class, 'destroy'])->name('admin.modules.destroy');
    Route::get('/{course}', [AdminCoursesController::class, 'show'])->name('admin.modules.show');

});

Route::prefix('admin/lessons')->group(function () 
{
    Route::get('/', [LessonController::class, 'index'])->name('admin.lessons.index');
    Route::get('/create', [LessonController::class, 'create'])->name('admin.lessons.create');
    Route::post('/', [LessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('/{lesson}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::put('/{lesson}', [LessonController::class, 'update'])->name('admin.lessons.update');
    Route::delete('/{lesson}', [LessonController::class, 'destroy'])->name('admin.lessons.destroy');
    Route::get('/{course}', [AdminCoursesController::class, 'show'])->name('admin.lessons.show');

});


Route::prefix('admin/professors')->group(function () {
    Route::get('/', [ProfessorController::class, 'index'])->name('admin.professors.index');
    Route::get('/create', [ProfessorController::class, 'create'])->name('admin.professors.create');
    Route::post('/', [ProfessorController::class, 'store'])->name('admin.professors.store');
    Route::get('/{professor}/edit', [ProfessorController::class, 'edit'])->name('admin.professors.edit');
    Route::put('/{professor}', [ProfessorController::class, 'update'])->name('admin.professors.update');
    Route::delete('/{professor}', [ProfessorController::class, 'destroy'])->name('admin.professors.destroy');
    Route::get('/{course}', [AdminCoursesController::class, 'show'])->name('admin.professors.show');

});

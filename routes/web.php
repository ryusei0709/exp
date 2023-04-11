<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('department')->group(function () {
    Route::get('/regist', [DepartmentController::class, 'regist']);
    Route::post('/add', [DepartmentController::class, 'add']);
    Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
});
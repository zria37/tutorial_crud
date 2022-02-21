<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Models\Employees;

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

Route::get('/pegawai', [EmployeesController::class, 'index'])->name('pegawai');

// untuk insert 
Route::get('/addpegawai', [EmployeesController::class, 'addpegawai'])->name('addpegawai');
Route::post('/insertpegawai', [EmployeesController::class, 'insert'])->name('insert');

// Edit/Update
Route::get('/editpegawai/{id}', [EmployeesController::class, 'editpegawai'])->name('editpegawai');
Route::post('/updatepegawai/{id}', [EmployeesController::class, 'update'])->name('update');

// Delete
Route::get('/deletepegawai/{id}', [EmployeesController::class, 'delete'])->name('delete');


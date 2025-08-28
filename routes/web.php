<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

Route::get('/',[EmployeeController::class,'index']);
Route::resource('employee', EmployeeController::class);
Route::post('employee/{employee}',
    [EmployeeController::class, 'restore']
)->withTrashed()->name('employee.restore');
Route::get('employee/{employee}',
    [EmployeeController::class, 'delete']
)->withTrashed()->name('employee.delete');


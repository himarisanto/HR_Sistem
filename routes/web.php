<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\http\Controllers\EmployeeRecordController;
use App\http\Controllers\AttendanceController;




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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/search', [DashboardController::class, 'index'])->name('dashboard.search');

Route::get('/layouts/master', [HomeController::class, 'index']);
Route::get('/admin/user', [HomeController::class, 'user']);
Route::post('/admin/user', [HomeController::class, 'getUser'])->name('user.getUser');
Route::get('/Users', [UsersController::class, 'index'])->name('users.index');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/golongan', [EmployeeController::class, 'golongan'])->name('employees.golongan');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


Route::get('/pelanggaran', [EmployeeRecordController::class, 'index'])->name('pelanggaran.index');
Route::get('/pelanggaran/create', [EmployeeRecordController::class, 'create'])->name('pelanggaran.create');
Route::post('/pelanggaran', [EmployeeRecordController::class, 'store'])->name('pelanggaran.store');
Route::get('/pelanggaran/{pelanggaran}/edit', [EmployeeRecordController::class, 'edit'])->name('pelanggaran.edit');
Route::put('pelanggaran/{pelanggaran}', [EmployeeRecordController::class, 'update'])->name('pelanggaran.update');
Route::delete('pelanggaran/{pelanggaran}', [EmployeeRecordController::class, 'destroy'])->name('pelanggaran.destroy');
Route::get('pelanggaran/followup/{id_number}', [EmployeeRecordController::class, 'followup'])->name('pelanggaran.followup');
Route::post('/pelanggaran/followup/save', [EmployeeRecordController::class, 'saveFollowup'])->name('pelanggaran.followup.save');

Route::get('/attendances', [AttendanceController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create', [AttendanceController::class, 'create'])->name('absensi.create');
Route::post('/absensi', [AttendanceController::class, 'store'])->name('absensi.store');
Route::get('/attendances/export', [AttendanceController::class, 'export'])->name('absensi.export');
Route::post('/attendances/import', [AttendanceController::class, 'import'])->name('absensi.import');


Route::post('/employees/restore/{id_number}', [EmployeeController::class, 'restore'])->name('employees.restore');
Route::get('/employees/archive', [EmployeeController::class, 'archive'])->name('employees.archive');
Route::delete('employees/archive/{id_number}', [EmployeeController::class, 'destroyArchive'])->name('employee.destroyArchive');
Route::get('employees/export', [EmployeeController::class, 'export'])->name('employees.export');
Route::post('employees/import', [EmployeeController::class, 'import'])->name('employees.import');

<?php

use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\Admin\CasesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\Evaluation_TypesController;
use App\Http\Controllers\Admin\EvaluationsController;
use App\Http\Controllers\Admin\MedicatesController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\Product_TypesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ReportPatientController;
use App\Http\Controllers\Admin\SuppliersController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

Route::resource('/patients', PatientsController::class);
Route::resource('/cases', CasesController::class);
Route::resource('/doctors', DoctorsController::class);
Route::resource('/appointments', AppointmentsController::class);
Route::resource('/evaluations', EvaluationsController::class);
Route::resource('/evaluation_types', Evaluation_TypesController::class);
Route::resource('/medicates', MedicatesController::class);
Route::resource('/products', ProductsController::class);
Route::resource('/product_types', Product_TypesController::class);
Route::resource('/suppliers', SuppliersController::class);
<<<<<<< HEAD

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::resource('/reportpatients', ReportPatientController::class);
// Route::get('/reportpatients_search', [ReportPatientController::class, 'search']);
>>>>>>> 676463ed3c3f2cdb6aa730621fb33e3750f12f5a

<?php

use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\Admin\BuysController;
use App\Http\Controllers\Admin\CasesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\Evaluation_TypesController;
use App\Http\Controllers\Admin\EvaluationsController;
use App\Http\Controllers\Admin\MedicatesController;
use App\Http\Controllers\Admin\Order_DetailsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\Product_TypesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ReportController;
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

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::resource('/patients', PatientsController::class);

Route::resource('/cases', CasesController::class);
Route::get('/casescreatelink', [CasesController::class, 'createLink'])->name('casesCreateLink');
Route::get('/casescreatelinkappointments/{id}', [CasesController::class, 'createLinkAppointments'])->name('casesCreateLinkAppointments');
Route::post('/casesstorelink', [CasesController::class, 'storeLink'])->name('casesStoreLink');

Route::resource('/doctors', DoctorsController::class);

Route::resource('/appointments', AppointmentsController::class);
Route::get('/appointmentscreatelink/{id}', [AppointmentsController::class, 'createLink'])->name('appointmentsCreateLink');

Route::resource('/evaluations', EvaluationsController::class);
Route::get('/evaluationscreatelink/{id}', [EvaluationsController::class, 'createLink'])->name('evaluationsCreateLink');

Route::resource('/evaluation_types', Evaluation_TypesController::class);

Route::resource('/medicates', MedicatesController::class);
Route::get('/medicatescreatelink/{id}', [MedicatesController::class, 'createLink'])->name('medicatesCreateLink');

Route::resource('/products', ProductsController::class);

Route::resource('/product_types', Product_TypesController::class);

Route::resource('/suppliers', SuppliersController::class);

Route::resource('/orders', OrdersController::class);

Route::resource('/order_details', Order_DetailsController::class);
Route::get('/order_detailscreatelink', [Order_DetailsController::class, 'createLink'])->name('order_DetailsCreateLink');

Route::resource('/buys', BuysController::class);

Route::resource('payments', PaymentsController::class);

Route::get('/reportpatient', [ReportController::class, 'reportPatient'])->name('reportPatient');
Route::post('/reportpatient', [ReportController::class, 'reportPatientSearch'])->name('reportPatientSearch');

Route::get('/reportcase', [ReportController::class, 'reportCase'])->name('reportCase');
Route::post('/reportcase', [ReportController::class, 'reportCaseSearch'])->name('reportCaseSearch');

Route::get('/reportevaluation', [ReportController::class, 'reportEvaluation'])->name('reportEvaluation');
Route::post('/reportevaluation', [ReportController::class, 'reportEvaluationSearch'])->name('reportEvaluationSearch');
Route::get('/reportevaluationprint/{id}', [ReportController::class, 'reportEvaluationPrint'])->name('reportEvaluationPrint');

Route::get('/reportappointment', [ReportController::class, 'reportAppointment'])->name('reportAppointment');
Route::post('/reportappointmentsearch', [ReportController::class, 'reportAppointmentSearch'])->name('reportAppointmentSearch');
Route::get('/reportappointmentprint/{id}', [ReportController::class, 'reportAppointmentPrint'])->name('reportAppointmentPrint');

Route::get('/reporttreatment', [ReportController::class, 'reportTreatment'])->name('reportTreatment');
Route::get('/reporttreatmentshow/{id}', [ReportController::class, 'reportTreatmentShow'])->name('reportTreatmentShow');
Route::post('/reporttreatmentsearch', [ReportController::class, 'reportTreatmentSearch'])->name('reportTreatmentSearch');
Route::get('/reporttreatmentprint/{id}', [ReportController::class, 'reportTreatmentPrint'])->name('reportTreatmentPrint');

Route::get('/reportsupplier', [ReportController::class, 'reportSupplier'])->name('reportSupplier');

Route::get('/reportproduct', [ReportController::class, 'reportProduct'])->name('reportProduct');

Route::get('/reportexpense', [ReportController::class, 'reportExpense'])->name('reportExpense');

Route::get('/reportincome', [ReportController::class, 'reportIncome'])->name('reportIncome');

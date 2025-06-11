<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\health_hazard_applications\AdminHealthHazardApplication;
use App\Http\Controllers\health_hazard_applications\HealthHazardApplication;

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

// Route::get('/test', function () {
//     return view('welcome');
// });

//auth
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login-page', [AuthController::class, 'LoginPage'])->name('LoginPage');
Route::get('/register-page', [AuthController::class, 'RegisterPage'])->name('RegisterPage');
Route::post('/login', [AuthController::class, 'Login'])->name('Login');
Route::post('/register', [AuthController::class, 'Register'])->name('Register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'AdminIndex'])->name('AdminIndex');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/admin/health_hazard_applications/form', [HealthHazardApplication::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
    Route::post('/admin/health_hazard_applications/form/create', [HealthHazardApplication::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');
    Route::get('/admin/health_hazard_applications/showdata', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminShowData'])->name('HealthHazardApplicationAdminShowData');
    Route::get('/admin/health_hazard_applications/appointment', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminAppointment'])->name('HealthHazardApplicationAdminAppointment');
    Route::get('/admin/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminExportPDF'])->name('HealthHazardApplicationAdminExportPDF');
    Route::post('/admin/health_hazard_applications/admin-reply/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminReply'])->name('HealthHazardApplicationAdminReply');
    Route::post('/admin/health_hazard_applications/update-status/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationUpdateStatus'])->name('HealthHazardApplicationUpdateStatus');
    Route::get('/admin/health_hazard_applications/showdata/confirm/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminConfirm'])->name('HealthHazardApplicationAdminConfirm');
    Route::put('/admin/health_hazard_applications/confirm', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminConfirmSave'])->name('HealthHazardApplicationAdminConfirmSave');
    Route::get('/admin/health_hazard_applications/detail/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminDetail'])->name('HealthHazardApplicationAdminDetail');
    Route::get('/admin/health_hazard_applications/calendar/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminCalendar'])->name('HealthHazardApplicationAdminCalendar');
    Route::put('/admin/health_hazard_applications/calendarSave', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminCalendarSave'])->name('HealthHazardApplicationAdminCalendarSave');
    Route::get('/admin/health_hazard_applications/explore', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminExplore'])->name('HealthHazardApplicationAdminExplore');
    Route::get('/admin/health_hazard_applications/checklist/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminChecklist'])->name('HealthHazardApplicationAdminChecklist');
    Route::put('/admin/health_hazard_applications/checklistSave', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminChecklistSave'])->name('HealthHazardApplicationAdminChecklistSave');
    Route::get('/admin/health_hazard_applications/payment', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminPayment'])->name('HealthHazardApplicationAdminPayment');
    Route::get('/admin/health_hazard_applications/payment-check/{id}', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminPaymentCheck'])->name('HealthHazardApplicationAdminPaymentCheck');
    Route::put('/admin/health_hazard_applications/paymentSave', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminPaymentSave'])->name('HealthHazardApplicationAdminPaymentSave');
    Route::get('/admin/health_hazard_applications/approve', [AdminHealthHazardApplication::class, 'HealthHazardApplicationAdminApprove'])->name('HealthHazardApplicationAdminApprove');
    Route::get('/admin/certificate/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplication::class, 'AdminCertificateHealthHazardApplicationPDF'])->name('AdminCertificateHealthHazardApplicationPDF');
    Route::post('/admin/certificate/health_hazard_applications/extend', [AdminHealthHazardApplication::class, 'CertificateHealthHazardApplicationCoppy'])->name('CertificateHealthHazardApplicationCoppy');
    Route::get('/admin/health_hazard_applications/expire', [AdminHealthHazardApplication::class, 'CertificateHealthHazardApplicationExpire'])->name('CertificateHealthHazardApplicationExpire');
});

Route::middleware(['user'])->group(function () {
    Route::get('/user/index', [UsersController::class, 'UsersIndex'])->name('UsersIndex');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    // Route::get('/user-account/health_hazard_applications', [HealthHazardApplication::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
    // Route::post('/user-account/health_hazard_applications/form/create', [HealthHazardApplication::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');
    Route::get('/user-account/health_hazard_applications/show-details', [HealthHazardApplication::class, 'HealthHazardApplicationShowDetails'])->name('HealthHazardApplicationShowDetails');
    Route::get('/user-account/health_hazard_applications/export-pdf/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationUserExportPDF'])->name('HealthHazardApplicationUserExportPDF');
    Route::post('/user-account/health_hazard_applications/reply/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationUserReply'])->name('HealthHazardApplicationUserReply');
    Route::get('/user-account/health_hazard_applications/show-edit/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationUserShowFormEdit'])->name('HealthHazardApplicationUserShowFormEdit');
    Route::get('/user-account/certificate/health_hazard_applications/export-pdf/{id}', [HealthHazardApplication::class, 'CertificateHealthHazardPDF'])->name('CertificateHealthHazardPDF');
    Route::get('/user-account/health_hazard_applications/detail/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationDetail'])->name('HealthHazardApplicationDetail');
    Route::get('/user-account/health_hazard_applications/calendar/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationCalendar'])->name('HealthHazardApplicationCalendar');
    Route::put('/user-account/health_hazard_applications/calendarSave', [HealthHazardApplication::class, 'HealthHazardApplicationCalendarSave'])->name('HealthHazardApplicationCalendarSave');
    Route::get('/user-account/health_hazard_applications/payment/{id}', [HealthHazardApplication::class, 'HealthHazardApplicationPayment'])->name('HealthHazardApplicationPayment');
    Route::put('/user-account/health_hazard_applications/paymentSave', [HealthHazardApplication::class, 'HealthHazardApplicationPaymentSave'])->name('HealthHazardApplicationPaymentSave');
});

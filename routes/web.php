<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Test;
use App\Http\Controllers\health_hazard_applications\AdminHealthHazardApplication;
use App\Http\Controllers\health_hazard_applications\HealthHazardApplication;
use App\Http\Controllers\food_license\AdminFoodLicense;
use App\Http\Controllers\food_license\FoodLicense;

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

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/admin/food_storage_license/form', [FoodLicense::class, 'FoodStorageLicenseFormPage'])->name('FoodStorageLicenseFormPage');
    Route::post('/admin/food_storage_license/form/create', [FoodLicense::class, 'FoodStorageLicenseFormCreate'])->name('FoodStorageLicenseFormCreate');
    Route::get('/admin/food_storage_license/showdata', [AdminFoodLicense::class, 'FoodStorageLicenseAdminShowData'])->name('FoodStorageLicenseAdminShowData');
    Route::get('/admin/food_storage_license/appointment', [AdminFoodLicense::class, 'FoodStorageLicenseAdminAppointment'])->name('FoodStorageLicenseAdminAppointment');
    Route::get('/admin/food_storage_license/explore', [AdminFoodLicense::class, 'FoodStorageLicenseAdminExplore'])->name('FoodStorageLicenseAdminExplore');
    Route::get('/admin/food_storage_license/payment', [AdminFoodLicense::class, 'FoodStorageLicenseAdminPayment'])->name('FoodStorageLicenseAdminPayment');
    Route::get('/admin/food_storage_license/approve', [AdminFoodLicense::class, 'FoodStorageLicenseAdminApprove'])->name('FoodStorageLicenseAdminApprove');
    Route::get('/admin/food_storage_license/export-pdf/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminExportPDF'])->name('FoodStorageLicenseAdminExportPDF');
    Route::get('/admin/food_storage_license/calendar/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminCalendar'])->name('FoodStorageLicenseAdminCalendar');
    Route::get('/admin/food_storage_license/checklist/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminChecklist'])->name('FoodStorageLicenseAdminChecklist');
    Route::get('/admin/food_storage_license/payment-check/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminPaymentCheck'])->name('FoodStorageLicenseAdminPaymentCheck');
    Route::get('/admin/food_storage_license/detail/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminDetail'])->name('FoodStorageLicenseAdminDetail');
    Route::get('/admin/food_storage_license/confirm/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminConfirm'])->name('FoodStorageLicenseAdminConfirm');
    Route::put('/admin/food_storage_license/confirm', [AdminFoodLicense::class, 'FoodStorageLicenseAdminConfirmSave'])->name('FoodStorageLicenseAdminConfirmSave');
    Route::put('/admin/food_storage_license/checklistSave', [AdminFoodLicense::class, 'FoodStorageLicenseAdminChecklistSave'])->name('FoodStorageLicenseAdminChecklistSave');
    Route::put('/admin/food_storage_license/calendarSave', [AdminFoodLicense::class, 'FoodStorageLicenseAdminCalendarSave'])->name('FoodStorageLicenseAdminCalendarSave');
    Route::put('/admin/food_storage_license/paymentSave', [AdminFoodLicense::class, 'FoodStorageLicenseAdminPaymentSave'])->name('FoodStorageLicenseAdminPaymentSave');
    Route::post('/admin/food_storage_license/admin-reply/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseAdminReply'])->name('FoodStorageLicenseAdminReply');
    Route::post('/admin/food_storage_license/update-status/{id}', [AdminFoodLicense::class, 'FoodStorageLicenseUpdateStatus'])->name('FoodStorageLicenseUpdateStatus');
    Route::get('/admin/certificate/food_storage_license/export-pdf/{id}', [AdminFoodLicense::class, 'AdminCertificateFoodStorageLicensePDF'])->name('AdminCertificateFoodStorageLicensePDF');
    Route::post('/admin/food_storage_license/extend', [AdminFoodLicense::class, 'FoodStorageLicenseCoppy'])->name('FoodStorageLicenseCoppy');
    Route::get('/admin/food_storage_license/expire', [AdminFoodLicense::class, 'FoodStorageLicenseExpire'])->name('FoodStorageLicenseExpire');

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

Route::middleware(['user'])->group(function () {});


//test
Route::get('/test', [Test::class, 'formPDF'])->name('formPDF');
Route::get('/form/pdf/1', [Test::class, 'formExportPDF1'])->name('formExportPDF1');
Route::get('/form/pdf/2', [Test::class, 'formExportPDF2'])->name('formExportPDF2');
Route::get('/form/pdf/3', [Test::class, 'formExportPDF3'])->name('formExportPDF3');
Route::get('/form/pdf/4', [Test::class, 'formExportPDF4'])->name('formExportPDF4');
Route::get('/form/pdf/5', [Test::class, 'formExportPDF5'])->name('formExportPDF5');
Route::get('/form/pdf/6', [Test::class, 'formExportPDF6'])->name('formExportPDF6');
Route::get('/form/pdf/7', [Test::class, 'formExportPDF7'])->name('formExportPDF7');
Route::get('/form/pdf/8', [Test::class, 'formExportPDF8'])->name('formExportPDF8');
Route::get('/form/pdf/9', [Test::class, 'formExportPDF9'])->name('formExportPDF9');

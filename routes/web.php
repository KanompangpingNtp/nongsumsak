<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Test;
use App\Http\Controllers\health_hazard_applications\AdminHealthHazardApplication;
use App\Http\Controllers\health_hazard_applications\HealthHazardApplication;
use App\Http\Controllers\food_collection\AdminFoodCollection;
use App\Http\Controllers\food_collection\FoodCollection;
use App\Http\Controllers\food_sales\AdminFoodSales;
use App\Http\Controllers\food_sales\FoodSales;

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

    //ใบอนุญาตจัดตั้งสถานที่สะสมอาหาร
    Route::get('/admin/food_collection/form', [FoodCollection::class, 'FoodCollectionFrom'])->name('FoodCollectionFrom');
    Route::post('/admin/food_collection/form/create', [FoodCollection::class, 'FoodCollectionFromCreate'])->name('FoodCollectionFromCreate');
    Route::get('/admin/food_collection/showdata', [AdminFoodCollection::class, 'FoodCollectionAdminShowData'])->name('FoodCollectionAdminShowData');
    Route::get('/admin/food_collection/export-pdf/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminExportPDF'])->name('FoodCollectionAdminExportPDF');
    Route::get('/admin/food_collection/showdata/confirm/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminConfirm'])->name('FoodCollectionAdminConfirm');
    Route::put('/admin/food_collection/confirm', [AdminFoodCollection::class, 'FoodCollectionAdminConfirmSave'])->name('FoodCollectionAdminConfirmSave');
    Route::get('/admin/food_collection/detail/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminDetail'])->name('FoodCollectionAdminDetail');
    Route::get('/admin/food_collection/appointment', [AdminFoodCollection::class, 'FoodCollectionAdminAppointment'])->name('FoodCollectionAdminAppointment');
    Route::get('/admin/food_collection/calendar/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminCalendar'])->name('FoodCollectionAdminCalendar');
    Route::put('/admin/food_collection/calendarSave', [AdminFoodCollection::class, 'FoodCollectionAdminCalendarSave'])->name('FoodCollectionAdminCalendarSave');
    Route::get('/admin/food_collection/explore', [AdminFoodCollection::class, 'FoodCollectionAdminExplore'])->name('FoodCollectionAdminExplore');
    Route::get('/admin/food_collection/checklist/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminChecklist'])->name('FoodCollectionAdminChecklist');
    Route::put('/admin/food_collection/checklistSave', [AdminFoodCollection::class, 'FoodCollectionAdminChecklistSave'])->name('FoodCollectionAdminChecklistSave');
    Route::get('/admin/food_collection/payment', [AdminFoodCollection::class, 'FoodCollectionAdminPayment'])->name('FoodCollectionAdminPayment');
    Route::get('/admin/food_collection/payment-check/{id}', [AdminFoodCollection::class, 'FoodCollectionAdminPaymentCheck'])->name('FoodCollectionAdminPaymentCheck');
    Route::put('/admin/food_collection/paymentSave', [AdminFoodCollection::class, 'FoodCollectionAdminPaymentSave'])->name('FoodCollectionAdminPaymentSave');
    Route::get('/admin/food_collection/approve', [AdminFoodCollection::class, 'FoodCollectionAdminApprove'])->name('FoodCollectionAdminApprove');
    Route::get('/admin/certificate/food_collection/export-pdf/{id}', [AdminFoodCollection::class, 'AdminCertificateFoodCollectionPDF'])->name('AdminCertificateFoodCollectionPDF');
    Route::post('/admin/certificate/food_collection/extend', [AdminFoodCollection::class, 'CertificateFoodCollectionCoppy'])->name('CertificateFoodCollectionCoppy');
    Route::get('/admin/food_collection/expire', [AdminFoodCollection::class, 'CertificateFoodCollectionExpire'])->name('CertificateFoodCollectionExpire');

    //ใบอนุญาตจัดตั้งสถานที่จำหน่ายอาหาร
    Route::get('/admin/food_sales/form', [FoodSales::class, 'FoodSalesFrom'])->name('FoodSalesFrom');
    Route::post('/admin/food_sales/form/create', [FoodSales::class, 'FoodSalesFromCreate'])->name('FoodSalesFromCreate');
    Route::get('/admin/food_sales/showdata', [AdminFoodSales::class, 'FoodSalesAdminShowData'])->name('FoodSalesAdminShowData');
    Route::get('/admin/food_sales/export-pdf/{id}', [AdminFoodSales::class, 'FoodSalesAdminExportPDF'])->name('FoodSalesAdminExportPDF');
    Route::get('/admin/food_sales/showdata/confirm/{id}', [AdminFoodSales::class, 'FoodSalesAdminConfirm'])->name('FoodSalesAdminConfirm');
    Route::put('/admin/food_sales/confirm', [AdminFoodSales::class, 'FoodSalesAdminConfirmSave'])->name('FoodSalesAdminConfirmSave');
    Route::get('/admin/food_sales/detail/{id}', [AdminFoodSales::class, 'FoodSalesAdminDetail'])->name('FoodSalesAdminDetail');
    Route::get('/admin/food_sales/appointment', [AdminFoodSales::class, 'FoodSalesAdminAppointment'])->name('FoodSalesAdminAppointment');
    Route::get('/admin/food_sales/calendar/{id}', [AdminFoodSales::class, 'FoodSalesAdminCalendar'])->name('FoodSalesAdminCalendar');
    Route::put('/admin/food_sales/calendarSave', [AdminFoodSales::class, 'FoodSalesAdminCalendarSave'])->name('FoodSalesAdminCalendarSave');
    Route::get('/admin/food_sales/explore', [AdminFoodSales::class, 'FoodSalesAdminExplore'])->name('FoodSalesAdminExplore');
    Route::get('/admin/food_sales/checklist/{id}', [AdminFoodSales::class, 'FoodSalesAdminChecklist'])->name('FoodSalesAdminChecklist');
    Route::put('/admin/food_sales/checklistSave', [AdminFoodSales::class, 'FoodSalesAdminChecklistSave'])->name('FoodSalesAdminChecklistSave');
    Route::get('/admin/food_sales/payment', [AdminFoodSales::class, 'FoodSalesAdminPayment'])->name('FoodSalesAdminPayment');
    Route::get('/admin/food_sales/payment-check/{id}', [AdminFoodSales::class, 'FoodSalesAdminPaymentCheck'])->name('FoodSalesAdminPaymentCheck');
    Route::put('/admin/food_sales/paymentSave', [AdminFoodSales::class, 'FoodSalesAdminPaymentSave'])->name('FoodSalesAdminPaymentSave');
    Route::get('/admin/food_sales/approve', [AdminFoodSales::class, 'FoodSalesAdminApprove'])->name('FoodSalesAdminApprove');
    Route::get('/admin/certificate/food_sales/export-pdf/{id}', [AdminFoodSales::class, 'AdminCertificateFoodSalesPDF'])->name('AdminCertificateFoodSalesPDF');
    Route::post('/admin/certificate/food_sales/extend', [AdminFoodSales::class, 'CertificateFoodSalesCoppy'])->name('CertificateFoodSalesCoppy');
    Route::get('/admin/food_sales/expire', [AdminFoodSales::class, 'CertificateFoodSalesExpire'])->name('CertificateFoodSalesExpire');

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

<?php

use App\Http\Livewire\Index;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\BusinessLoginController;
use App\Http\Controllers\Admin\BusinessUnitController;
use App\Http\Controllers\Admin\AdminController;

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/business-login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/dash-board', [AdminController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/disable-video-feedback/{id}',[AdminController::class,'disableVideoFeedback'])->name('admin.disableVideoFeedback');
    Route::post('/delete-video-feedback/{id}',[AdminController::class,  'deleteVideoFeedback'])->name('admin.deleteVideoFeedback');
    Route::post('feedback-video/{videoId}/save-comment', [AdminController::class, 'saveComment'])->name('admin.saveComment');
    Route::post('feedback-video/{videoId}/save-rating', [AdminController::class, 'saveRating'])->name('admin.saveRating');


});

Route::prefix('admin')->middleware('auth:admins')->group(function () {
    Route::get('/dash-board', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    
        Route::controller(BusinessUnitController::class)->group(function() {
        Route::get('/add-business-unit', 'showBusinessUnit')->name('addBusinessUnit');
        Route::post('/save-business-unit','saveBusinessUnit')->name('admin.save-business-unit');
        Route::get('/manage-business-unit', 'manageBusinessUnit')->name('manageBusinessUnit');
        Route::post('/delete-business-unit/{id}',  'deleteBusinessUnit')->name('admin.deleteBusinessUnit');
        Route::get('/edit-business-unit/{id}', 'editBusinessUnit')->name('admin.edit-business-unit');
        Route::put('/update-business-unit/{id}', 'updateBusinessUnit')->name('admin.update-business-unit');
    });
});

Route::get('/', [SuperAdminController::class, 'businessRegister'])->name('businessRegister');

Route::post('/save-business-register', [SuperAdminController::class, 'saveBusinessRegister'])->name('saveBusinessRegister');
## super admin login
Route::controller(SuperAdminController::class)->group(function() {
    Route::get('superadmin/', 'superadminlogin')->name('login');
    Route::post('superadmin/authenticate', 'authenticate')->name('authenticate');
    Route::get('superadmin/dashboard', 'dashboard')->name('dashboard');
    Route::post('superadmin/logout', 'logout')->name('sulogout');
    // Route::post('superadmin/logout', 'sulogout')->name('sulogout');
});

##super admin routes
Route::prefix('superadmin')->middleware(['superadmin'])->group(function () {
  
    Route::get('/addadmin', [SuperAdminController::class, 'addadmin']);
   
    Route::get('/businesslist', [SuperAdminController::class, 'businesslist']);
});

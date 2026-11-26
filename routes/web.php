<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthController as LegacyAuthController;
use App\Http\Controllers\AuthRedirectController;
use App\Http\Controllers\Crons\ReminderController;
use App\Http\Controllers\External\DashboardController as ExternalDashboardController;
use App\Http\Controllers\External\FormController as ExternalFormController;
use App\Http\Controllers\External\ProfileController as ExternalProfileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Internal\DashboardController as InternalDashboardController;
use App\Http\Controllers\Internal\FormController as InternalFormController;
use App\Http\Controllers\PasswordChnageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public & Landing Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return 'Cache cleared successfully!';
})->name('cache.clear');

/*
|--------------------------------------------------------------------------
| Authentication, Verification, Password Reset & OTP Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

Route::post('/login/validate', [AuthController::class, 'validateLogin'])->name('auth.login.validate');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('auth.register.submit');
Route::get('/user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('auth.verify.email');
Route::post('/user/verify/resend', [AuthController::class, 'resendVerificationEmail'])->name('auth.verify.resend');

Route::get('/newlog', [TestController::class, 'newlog'])->name('auth.login.alt');
Route::get('/forgetpassword', [TestController::class, 'forgetpassword'])->name('auth.password.forgot');
Route::get('/forget-password', [TestController::class, 'showForgetPasswordForm'])->name('auth.password.forgot.form');
Route::post('/forget-password', [TestController::class, 'submitForgetPasswordForm'])->name('auth.password.forgot.submit');
Route::get('/reset-password/{token}', [TestController::class, 'showResetPasswordForm'])->name('auth.password.reset.form');
Route::post('/reset-password', [TestController::class, 'submitResetPasswordForm'])->name('auth.password.reset.submit');

Route::get('/password/change', [PasswordChnageController::class, 'showChangePasswordForm'])->name('auth.password.change.form');
Route::post('/password/change', [PasswordChnageController::class, 'changePassword'])->name('auth.password.change.submit');

Route::post('/UserLogin', [LegacyAuthController::class, 'userLogin'])->name('auth.legacy.login');
Route::get('/onb_validate', [AuthRedirectController::class, 'onb_validate'])->name('auth.onb.validate');

Route::get('/otp/verify', [AuthController::class, 'showOtpForm'])->name('auth.otp.verify.form');
Route::post('/otp/verify', [AuthController::class, 'verifyOtp'])->name('auth.otp.verify.submit');
Route::get('/otp/resend', [AuthController::class, 'resendOtp'])->name('auth.otp.resend');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ==================== ACCOUNT PROFILE & PASSWORD (ALL AUTHENTICATED USERS) ====================
    Route::get('/users/profile', [ExternalProfileController::class, 'index'])->name('external.profile');
    Route::post('/users/profile-update', [ExternalProfileController::class, 'update'])->name('external.profile.update');
    Route::get('/users/profile-password', [ExternalProfileController::class, 'profilepasssword'])->name('external.profile.password');
    Route::post('/users/profile-password-update', [ExternalProfileController::class, 'userpasswordupdate'])->name('external.profile.password.update');

    // ==================== EXTERNAL PARTICIPANT ROUTES ====================
    Route::middleware(['role:external'])->name('external.')->group(function () {
        Route::get('/users/dashboard', [ExternalDashboardController::class, 'index'])->name('dashboard');

        Route::post('/onboarding/start', [ExternalFormController::class, 'startOnboarding'])->name('onboarding.start');
        Route::get('/participantuser/{selectedValue}', [ExternalFormController::class, 'redirectToUrl'])->name('onboarding.redirect');

        // Unified 6-Step Onboarding Wizard
        Route::get('/users/partipante-form-step-one', [ExternalFormController::class, 'form_one'])->name('onboarding.step1.create');
        Route::post('/form_step_one', [ExternalFormController::class, 'form_step_one'])->name('onboarding.step1.store');
        Route::get('/users/partipante-form-step-one-edit/{id}', [ExternalFormController::class, 'form_one_edit'])->name('onboarding.step1.edit');
        Route::post('/form_step_one_update/{id}', [ExternalFormController::class, 'form_step_one_update'])->name('onboarding.step1.update');

        Route::get('/users/partipante-form-step-two/{id}', [ExternalFormController::class, 'form_two_edit'])->name('onboarding.step2.edit');
        Route::post('/form_step_two/{id}', [ExternalFormController::class, 'form_step_two'])->name('onboarding.step2.update');

        Route::get('/users/partipante-form-corespon/{id}', [ExternalFormController::class, 'form_cores_edit'])->name('onboarding.step3.edit');
        Route::post('/form_cores_post/{id}', [ExternalFormController::class, 'form_cores_post'])->name('onboarding.step3.update');

        Route::get('/users/partipante-form-step-three-edit/{id}', [ExternalFormController::class, 'form_three_edit'])->name('onboarding.step4.edit');
        Route::post('/form_step_three/{id}', [ExternalFormController::class, 'form_step_three'])->name('onboarding.step4.update');

        Route::get('/users/partipante-form-step-four/{id}', [ExternalFormController::class, 'form_four'])->name('onboarding.step5.edit');
        Route::post('/form_step_four/{id}', [ExternalFormController::class, 'form_step_four'])->name('onboarding.step5.update');

        Route::get('/users/partipante-form-step-six/{id}', [ExternalFormController::class, 'form_six'])->name('onboarding.step6.edit');
        Route::post('/form_step_six/{id}', [ExternalFormController::class, 'form_step_six'])->name('onboarding.step6.submit');

        Route::get('/users/application-view/{id}', [ExternalFormController::class, 'viewApplication'])->name('application.show');
        Route::post('/uploadreceipt', [ApplicationController::class, 'uploadreceipt'])->name('receipt.upload');
    });

    // ==================== INTERNAL REVIEW & REPORTING ROUTES ====================
    Route::middleware(['role:internal'])->name('internal.')->group(function () {
        Route::get('/admin/dashboard', [InternalDashboardController::class, 'index'])->name('dashboard');
        Route::get('/allapplications', [ApplicationController::class, 'allapplications'])->name('applications.index');
        Route::get('/applications/{status}', [ApplicationController::class, 'applications'])->name('applications.status');
        Route::get('/participant/{app_code}', [InternalFormController::class, 'participant'])->name('applications.show');
        Route::get('/report', [ReportController::class, 'index'])->name('reports.index');

        Route::post('/dodstatus', [ApplicationController::class, 'dodstatus'])->name('review.dsd');
        Route::post('/megstatus', [ApplicationController::class, 'megstatus'])->name('review.meg');
        Route::post('/dod_status', [ApplicationController::class, 'dod_status'])->name('review.dod');
        Route::post('/icgstatus', [ApplicationController::class, 'icgstatus'])->name('review.icg');
        Route::post('/uploadinvoice', [ApplicationController::class, 'uploadinvoice'])->name('invoice.upload');
    });

    // ==================== ADMIN USER / GROUP / ROLE / PERMISSION MANAGEMENT ====================
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [UserController::class, 'deleteUser'])->name('destroy');
        Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('update');
        Route::post('/update-password/{id}', [UserController::class, 'updateUserPassword'])->name('password.update');
    });

    Route::prefix('groups')->name('groups.')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::post('/store', [GroupController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [GroupController::class, 'delete'])->name('destroy');
        Route::post('/update/{id}', [GroupController::class, 'edit'])->name('update');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [RoleController::class, 'deleteRole'])->name('destroy');
        Route::post('/update/{id}', [RoleController::class, 'roleUpdate'])->name('update');
    });

    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/store', [PermissionController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [PermissionController::class, 'deletePermissions'])->name('destroy');
        Route::post('/update/{id}', [PermissionController::class, 'permissionsUpdate'])->name('update');
    });
});

/*
|--------------------------------------------------------------------------
| Cron / Maintenance Routes
|--------------------------------------------------------------------------
*/
Route::get('/applicationremider', [ReminderController::class, 'applicationremider'])->name('cron.application.reminder');
Route::get('/backup_database', [ReminderController::class, 'backup_database'])->name('cron.database.backup');

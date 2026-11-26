<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OtcfxController;
use App\Http\Controllers\QdealController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BloombergController;
use App\Http\Controllers\FixIncomeController;
use App\Http\Controllers\PenDealerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DerivativesController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AuthRedirectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\External\FormController;
use App\Http\Controllers\GlobalblotterController;
use App\Http\Controllers\Crons\ReminderController;
use App\Http\Controllers\PasswordChnageController;
use App\Http\Controllers\External\FormSettlementController;
use App\Http\Controllers\External\NonCapitalFormController;
use App\Http\Controllers\External\FormPrivateAccountController;



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

// Route::get('/', function () {
//     return Redirect::to('login');
// });

Route::get('/', function () {
  return view('welcome');
});


Route::get('newlog', [TestController::class, 'newlog'])->name('newlog');


Route::get('forgetpassword', [TestController::class, 'forgetpassword'])->name('forgetpassword');


Route::get('forget-password', [TestController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [TestController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [TestController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [TestController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::post('/login/validate', [AuthController::class, 'validateLogin'])->name('login.post');
Route::get('/user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify');


// Route::get('/user/verify/{token}', [
//   'uses' => 'AuthController@verifyEmail',
//   'as' => 'user.verify',
// ]);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function () {


  // //Verification Routes

  // Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
  // Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
  // Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');



  // USER
  Route::get('users', 'UserController@index');
  Route::post('users/store', 'UserController@store')->name('users.store');
  Route::post('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
  Route::get('editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
  Route::post('updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
  Route::post('updateUserPassword/{id}', [UserController::class, 'updateUserPassword'])->name('updateUserPassword');



  // USER
  Route::get('groups', 'GroupController@index');
  Route::post('groups/store', 'GroupController@store')->name('groupStore');
  Route::post('deleteGroup/{id}', [GroupController::class, 'delete'])->name('deleteGroup');
  Route::post('updateGroup/{id}', [GroupController::class, 'edit'])->name('updateGroup');



  // ROLE
  Route::get('roles', 'RoleController@index');
  Route::post('roleStore', 'RoleController@store')->name('roleStore');
  Route::post('deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('deleteRole');
  Route::post('roleUpdate/{id}', [RoleController::class, 'roleUpdate'])->name('roleUpdate');



  // Permissio
  Route::get('permissions', 'PermissionController@index');
  Route::post('permissionsStore', 'PermissionController@store')->name('permissionsStore');
  Route::post('deletePermissions/{id}', [PermissionController::class, 'deletePermissions'])->name('deletePermissions');
  Route::post('permissionsUpdate/{id}', [PermissionController::class, 'permissionsUpdate'])->name('permissionsUpdate');




  // ---- Participants ---//
  // Route::get('participants',[ParticipantController::class, 'index'])->name('participants');
  // Route::get('participant',[ParticipantController::class, 'participant'])->name('participant');
  Route::get('participantform', [ParticipantController::class, 'participantform'])->name('participantform');
  Route::post('participantformSubmit', [ParticipantController::class, 'participantformSubmit'])->name('participantformSubmit');
  Route::post('dodstatus', [ApplicationController::class, 'dodstatus'])->name('dodstatus');
  Route::post('megstatus', [ApplicationController::class, 'megstatus'])->name('megstatus');
  Route::post('icgstatus', [ApplicationController::class, 'icgstatus'])->name('icgstatus');
  Route::post('dod_status', [ApplicationController::class, 'dod_status'])->name('dod_status');
  Route::post('uploadinvoice', [ApplicationController::class, 'uploadinvoice'])->name('uploadinvoice');
  Route::post('uploadreceipt', [ApplicationController::class, 'uploadreceipt'])->name('uploadreceipt');
  Route::get('applications/{status}', [ApplicationController::class, 'applications'])->name('applications');
  Route::get('allapplications', [ApplicationController::class, 'allapplications'])->name('allapplications');
  Route::get('/report', [ReportController::class, 'index'])->name('report');

  // Participants list and single
  Route::get('/participant/{app_code}', 'Internal\FormController@participant')->middleware('role:internal')->name('participant');




  // Route::get('/participants/', 'Internal\FormController@participant')->middleware('role:internal')->name('participants');





  //External users route
  Route::get('/users/dashboard', 'External\DashboardController@index')->middleware('role:external')->name('userDashboard');
  Route::get('/users/profile', 'External\ProfileController@index')->middleware('role:external')->name('userProfile');
  Route::get('/users/profile-password', 'External\ProfileController@profilepasssword')->middleware('role:external')->name('profilePassword');
  Route::post('/users/profile-password-update', 'External\ProfileController@userpasswordupdate')->middleware('role:external')->name('userpasswordupdate');

  Route::get('/users/partipante-form-step-one', 'External\FormController@form_one')->middleware('role:external')->name('userform_one');
  Route::get('/users/partipante-form-step-one-edit/{id}', 'External\FormController@form_one_edit')->middleware('role:external')->name('userform_one_edit');


  Route::get('/users/partipante-form-step-two/{id}', 'External\FormController@form_two')->middleware('role:external')->name('userform_two');
  Route::get('/users/partipante-form-step-two/{id}', 'External\FormController@form_two_edit')->middleware('role:external')->name('userform_two_edit');

  Route::get('/users/partipante-form-corespon/{id}', 'External\FormController@form_cores_edit')->middleware('role:external')->name('form_cores_edit');


  Route::get('/users/partipante-form-step-three/{id}', 'External\FormController@form_three')->middleware('role:external')->name('userform_three');
  Route::get('users/partipante-form-step-three-edit/{id}', 'External\FormController@form_three_edit')->middleware('role:external')->name('userform_three_edit');


  Route::get('/users/partipante-form-step-four/{id}', 'External\FormController@form_four')->middleware('role:external')->name('userform_four');


  // User preview after form submission Route

  Route::get('/users/partipante-form-step-one-view/{id}', 'External\FormController@form_one_view')->middleware('role:external')->name('userform_one_view');
  Route::get('/users/partipante-form-step-two-view/{id}', 'External\FormController@form_two_view')->middleware('role:external')->name('userform_two_view');
  Route::get('/users/partipante-form-corespon-view/{id}', 'External\FormController@form_cores_view')->middleware('role:external')->name('form_cores_view');
  Route::get('/users/partipante-form-step-three_view/{id}', 'External\FormController@form_three_view')->middleware('role:external')->name('userform_three_view');
  Route::get('/users/partipante-form-step-four_view/{id}', 'External\FormController@form_four_view')->middleware('role:external')->name('userform_four_view');

  Route::get('/users/partipante-form-step-five', 'External\FormController@form_five')->middleware('role:external')->name('userform_five');





  // Form Submission Routes
  Route::post('/form_step_one', [FormController::class, 'form_step_one'])->name('form_step_one_ex');
  Route::post('/form_step_one_update/{id}', [FormController::class, 'form_step_one_update'])->name('form_step_one_update');
  Route::post('/form_step_two/{id}', [FormController::class, 'form_step_two'])->name('form_step_two');
  Route::post('/form_cores_post/{id}', [FormController::class, 'form_cores_post'])->name('form_cores_post');
  Route::post('/form_step_three/{id}', [FormController::class, 'form_step_three'])->name('form_step_three');
  Route::post('/form_step_four/{id}', [FormController::class, 'form_step_four'])->name('form_step_four');


  Route::get('/admin/dashboard', 'Internal\DashboardController@index')->middleware('role:adminDashboard')->name('adminDashboard');


  // Route::get('/partipante-form-step-one/{selectedValue}', 'External\FormController@form_one')->middleware('role:external')->name('userform_one');
  Route::get('participantuser/{selectedValue}', [FormController::class, 'redirectToUrl'])->name('redirect');


  // Settlement Bank Route
  Route::post('/form_step_one_SB', [FormSettlementController::class, 'form_step_one'])->name('form_step_one_settlement_bank');

  Route::get('/Settlement-Banks/form-step-one/{id}', [FormSettlementController::class, 'form_one_edit'])->middleware('role:external')->name('form_one_edit_SB');

  Route::post('/form_step_one_SB_update/{id}', [FormSettlementController::class, 'form_step_one_update'])->name('form_step_one_update_SB');

  Route::get('/Settlement-Banks/form-step-two/{id}', [FormSettlementController::class, 'form_two_edit'])->middleware('role:external')->name('form_two_edit_SB');

  Route::post('/form_step_two_SB/{id}', [FormSettlementController::class, 'form_step_two'])->name('form_step_two_SB');

  Route::get('/Settlement-Banks/form-step-three/{id}', [FormSettlementController::class, 'form_three_edit'])->middleware('role:external')->name('form_three_edit_SB');

  Route::post('/form_step_three_SB/{id}', [FormSettlementController::class, 'form_step_three'])->name('form_step_three_SB');

  Route::get('/Settlement-Banks/form-step-four/{id}', [FormSettlementController::class, 'form_four'])->middleware('role:external')->name('userform_four_SB');

  Route::post('/form_step_four_SB/{id}', [FormSettlementController::class, 'form_step_four'])->name('form_step_four_SB');

  Route::get('/Settlement-Banks/form-step-one-view/{id}', [FormSettlementController::class, 'form_one_view'])->middleware('role:external')->name('form_one_view_SB');

  Route::get('/Settlement-Banks/form-step-two-view/{id}', [FormSettlementController::class, 'form_two_view'])->middleware('role:external')->name('form_two_view_SB');

  Route::get('/Settlement-Banks/form-step-three-view/{id}', [FormSettlementController::class, 'form_three_view'])->middleware('role:external')->name('form_three_view_SB');

  Route::get('/Settlement-Banks/form-step-four-view/{id}', [FormSettlementController::class, 'form_four_view'])->middleware('role:external')->name('form_four_view_SB');










  // Priavte Accpount Route
  Route::post('/form_step_one_PA', [FormPrivateAccountController::class, 'form_step_one'])->name('form_step_one_private_account');

  Route::get('/Private-Account/form-step-one/{id}', [FormPrivateAccountController::class, 'form_one_edit'])->middleware('role:external')->name('form_one_edit_PA');

  Route::post('/form_step_one_update_PA/{id}', [FormPrivateAccountController::class, 'form_step_one_update'])->name('form_step_one_update_PA');

  Route::get('/Private-Account/form-step-two/{id}', [FormPrivateAccountController::class, 'form_two_edit'])->middleware('role:external')->name('form_two_edit_PA');

  Route::post('/form_step_two_PA/{id}', [FormPrivateAccountController::class, 'form_step_two'])->name('form_step_two_private_account');

  Route::get('/Private-Account/form-step-three/{id}', [FormPrivateAccountController::class, 'form_three_edit'])->middleware('role:external')->name('form_three_edit_PA');

  Route::post('/form_step_three_PA/{id}', [FormPrivateAccountController::class, 'form_step_three'])->name('form_step_three_private_account');

  Route::get('/Private-Account/form-step-four/{id}', [FormPrivateAccountController::class, 'form_four'])->middleware('role:external')->name('userform_four_PA');

  Route::post('/form_step_four_PA/{id}', [FormPrivateAccountController::class, 'form_step_four'])->name('form_step_four_private_account');

  Route::get('/Private-Account/form-step-one-view/{id}', [FormPrivateAccountController::class, 'form_one_view'])->middleware('role:external')->name('form_one_view_PA');

  Route::get('/Private-Account/form-step-two-view/{id}', [FormPrivateAccountController::class, 'form_two_view'])->middleware('role:external')->name('form_two_view_PA');

  Route::get('/Private-Account/form-step-three-view/{id}', [FormPrivateAccountController::class, 'form_three_view'])->middleware('role:external')->name('form_three_view_PA');

  Route::get('/Private-Account/form-step-four-view/{id}', [FormPrivateAccountController::class, 'form_four_view'])->middleware('role:external')->name('form_four_view_PA');











  // Corporate Accpount Route
  Route::post('/form_step_one_CO', [NonCapitalFormController::class, 'form_step_one'])->name('form_step_one_corporate_account');

  Route::get('/Corporate-Account/form-step-one/{id}', [NonCapitalFormController::class, 'form_one_edit'])->middleware('role:external')->name('form_one_edit_CO');

  Route::post('/form_step_one_update_CO/{id}', [NonCapitalFormController::class, 'form_step_one_update'])->name('form_step_one_update_CO');

  Route::get('/Corporate-Account/form-step-two/{id}', [NonCapitalFormController::class, 'form_two_edit'])->middleware('role:external')->name('form_two_edit_CO');

  Route::post('/form_step_two_CO/{id}', [NonCapitalFormController::class, 'form_step_two'])->name('form_step_two_corporate_account');

  Route::get('/Corporate-Account/form-step-three/{id}', [NonCapitalFormController::class, 'form_three_edit'])->middleware('role:external')->name('form_three_edit_CO');

  Route::post('/form_step_three_CO/{id}', [NonCapitalFormController::class, 'form_step_three'])->name('form_step_three_corporate_account');

  Route::get('/Corporate-Account/form-step-four/{id}', [NonCapitalFormController::class, 'form_four'])->middleware('role:external')->name('userform_four_CO');

  Route::post('/form_step_four_CO/{id}', [NonCapitalFormController::class, 'form_step_four'])->name('form_step_four_corporate_account');

  Route::get('/Corporate-Account/form-step-one-view/{id}', [NonCapitalFormController::class, 'form_one_view'])->middleware('role:external')->name('form_one_view_CO');

  Route::get('/Corporate-Account/form-step-two-view/{id}', [NonCapitalFormController::class, 'form_two_view'])->middleware('role:external')->name('form_two_view_CO');

  Route::get('/Corporate-Account/form-step-three-view/{id}', [NonCapitalFormController::class, 'form_three_view'])->middleware('role:external')->name('form_three_view_CO');

  Route::get('/Corporate-Account/form-step-four-view/{id}', [NonCapitalFormController::class, 'form_four_view'])->middleware('role:external')->name('form_four_view_CO');
});



Route::get('/password/change', [PasswordChnageController::class, 'showChangePasswordForm'])->name('password_change');
Route::post('/password/change', [PasswordChnageController::class, 'changePassword'])->name('password_update');




















Route::post('/UserLogin', 'AuthController@userLogin')->name('UserLogin');
Route::get('onb_validate', [AuthRedirectController::class, 'onb_validate']);

//CRONS
Route::get('applicationremider', [ReminderController::class, 'applicationremider']);
Route::get('backup_database', [ReminderController::class, 'backup_database']);

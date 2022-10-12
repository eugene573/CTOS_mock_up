<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

//Route for authenticating users' login and registration
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('userRegistration', [AuthController::class, 'userRegistration'])->name('user.register');
Route::get('agent-registration', [AuthController::class, 'agentRegistration'])->name('agent.register');
Route::post('post-registration', [AuthController::class, 'postUserRegistration'])->name('register.post'); 

//Route for manage details
Route::get('agent-edit', [AuthController::class, 'editAgent'])->name('agent.edit');
Route::get('member-edit', [AuthController::class, 'editMember'])->name('member.edit');
Route::get('member-update', [AuthController::class, 'updateMember'])->name('member.update');
Route::get('view-users',[AuthController::class, 'viewUser'])->name('user.view');

//Route::get('view-agent', [AuthController::class, 'viewAgent'])->name('agent.view');

Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Route for providing support if user forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'sendForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetPasswordForm'])->name('reset.password.post');


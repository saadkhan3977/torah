<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ViewController;
use App\Http\Controllers\User\PagesController;

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
// Index

Route::get('/', [PagesController::class, 'indexPage'])->name('index.get');
Route::get('/about', [PagesController::class, 'aboutPage'])->name('about.get');
Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact.get');
Route::get('/faq', [PagesController::class, 'faqPage'])->name('faq.get');
Route::get('/personal', [PagesController::class, 'personalPage'])->name('personal.get');
Route::get('/dafyumi', [PagesController::class, 'dafyumiPage'])->name('dafyumi.get');
Route::get('/drag', [PagesController::class, 'dragPage'])->name('drag.get');
Route::get('/leaderboard', [PagesController::class, 'leaderboardPage'])->name('leaderboard.get');
Route::get('/profile', [PagesController::class, 'profilePage'])->name('profile.get');
Route::get('/test', [PagesController::class, 'testPage'])->name('test.get');
Route::get('/daily', [PagesController::class, 'dailyPage'])->name('daily.get');

// user dashboard
Route::get('/dashboard', [PagesController::class, 'dashboardPage'])->name('dashboard.get');

// user auth
Route::get('/register',[AuthController::class,'registerPage'])->name('register.get');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');
Route::get('/login',[AuthController::class,'loginpage'])->name('login.get');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::get('/forgot-password',[AuthController::class,'forgotPage'])->name('forgot.get');
Route::post('/forgot-password',[AuthController::class,'forgotPost'])->name('forgot.post');
Route::get('/reset/{token}/password',[AuthController::class,'resetPage'])->name('reset.get');
Route::post('/reset-password',[AuthController::class,'resetPost'])->name('reset.post');

// logout
Route::get('/logout',[AuthController::class,'logout'])->name('logout.get');


// admin views
Route::get('/admin', [AuthController::class, 'admin_login_page'])->name('admin_login_page');
Route::get('/admin/forgot-password',[AuthController::class,'adminforgotPage'])->name('admin.forgot.get');
Route::post('/admin/forgot-password',[AuthController::class,'adminforgotPost'])->name('admin.forgot.post');
Route::get('/admin/reset/{token}/password',[AuthController::class,'adminresetPage'])->name('admin.reset.get');
Route::post('/admin/reset-password',[AuthController::class,'adminresetPost'])->name('admin.reset.post');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AuthController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/admin/user', [ViewController::class, 'adminUsers'])->name('admin.users.get');
    Route::post('/admin/user-register',   [AuthController::class, 'adminUsers_register'])->name('adminUsers_register');
    Route::post('/admin/user-edit',   [AuthController::class, 'adminUsers_edit'])->name('adminUsers_edit');
    Route::get('/admin/user-delete/{id}',   [AuthController::class, 'adminUsers_delete'])->name('adminUsers_delete');
    Route::get('/admin/book', [ViewController::class, 'adminbook'])->name('admin.book');
    Route::post('/admin/room-pdf-add', [ViewController::class, 'roomPdfAdd'])->name('roomPdfAdd');
    Route::get('/admin/daily-quiz', [ViewController::class, 'adminDailyQuiz'])->name('admin.daily.quiz');
    Route::post('/admin/daily-quiz', [ViewController::class, 'adminDailyQuizAdd'])->name('admin.daily.quiz.add');
    Route::get('/admin/trending', [ViewController::class, 'adminTrending'])->name('admin.trending');
    Route::get('/admin/trending/{id}', [ViewController::class, 'adminTrendingPost'])->name('admin.trending.post');
    Route::get('/admin/trending-del/{id}', [ViewController::class, 'adminTrendingDel'])->name('admin.trending.del');
// Route::get('/admin/machine-delete/{id}',   [ViewsController::class, 'adminMachines_delete'])->name('adminMachines_delete');
});

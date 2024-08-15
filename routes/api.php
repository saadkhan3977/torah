<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\BookController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/clear', function () {
  Artisan::call('cache:clear');
  Artisan::call('route:clear');
  Artisan::call('config:clear');
  Artisan::call('view:clear');
  Artisan::call('optimize');
  Artisan::call('route:clear');
  dd( "Cache is cleared");
});
Route::post('register', [UserController::class, 'register']);
Route::post('social-media-register', [UserController::class, 'SocialMediaRegister']);
Route::post('login', [UserController::class, 'login']);
Route::post('forget-password-email', [UserController::class, 'ForgetPasswordEmail']);
Route::post('valid-email', [UserController::class, 'ValidEmail']);
Route::post('check-valid-email-code', [UserController::class, 'CheckValidEmailCodeVerification']);
Route::post('check-forget-password-code', [UserController::class, 'checkForgetPasswordCodeVerification']);
Route::post('update-forget-password', [UserController::class, 'updateForgetPassword']);


Route::middleware(['auth:api'])->group(function () {
    Route::post('addCourse', [BookController::class, 'addCourse']);
    Route::get('allCourse', [BookController::class, 'allCourse']);
    Route::post('addRoom', [BookController::class, 'addRoom']);
    Route::get('allRoom/{value}', [BookController::class, 'allRoom']);
    Route::post('addDaf', [BookController::class, 'addDaf']);
    Route::get('allDaf/{value}', [BookController::class, 'allDaf']);
    Route::get('getBook', [BookController::class, 'getBook']);
    Route::get('getDailyQuiz', [BookController::class, 'getDailyQuiz']);
    Route::post('postDailyQuiz', [BookController::class, 'postDailyQuiz']);
    Route::get('leaderboard', [BookController::class, 'leaderboard']);
    Route::get('get-trending', [BookController::class, 'getTrending']);
    
    Route::get('video/{id}/chunk/{chunkNumber}', [BookController::class, 'getVideoChunk']);
    Route::get('storeVideo', [BookController::class, 'storeVideo']);

    Route::post('logout', [UserController::class, 'logout']);
});
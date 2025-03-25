<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
//     return view('welcome');
// });

Route::get('/', function () { return view('welcome'); });

Route::get('/register', [RegisterController::class, 'create'])->name('register');;
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'login']);

Route::get('/email/verify', function () {
        return view('auth.verify'); // 認証待ち画面
    })->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); // 認証完了
        return redirect()->route('profile.setup'); // プロフィール登録画面へリダイレクト
    })->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '認証メールを再送信しました。');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

    /*
    Route::get('/send-test-mail', function () {
    Mail::raw('MailHogへの接続テストメールです。', function ($message) {
        $message->to('test@example.com')
                ->subject('接続テストメール');
    });

    return 'メール送信完了！';
    });
    */




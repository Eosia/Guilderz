<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\Request;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {return view('contact.index');})->name('contact')->middleware('throttle:contact');

// route de la page contact
#Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// route d'envoi du mail
Route::post('/send-message', [ContactController::class, 'send'])->name('contact.send');

//routes captcha
Route::post('my-captcha', [ContactController::class, 'CaptchaPost'])->name('myCaptcha.post');
Route::get('refresh_captcha', [ContactController::class, 'refreshCaptcha'])->name('refresh_captcha');
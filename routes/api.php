<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/generate-share-link', function (){
    // id будет браться из Auth::id
    // хардкод, чтобы не делать авторизацию
    // для теста сделал временную ссылку на 10 секунд, для постоянновй использовать метод  signedRoute
    return URL::temporarySignedRoute('share-profile', now()->addSeconds(10), [
        'id' => 1,
        'hash' => base64_encode(config('app.key'))
    ]);
});

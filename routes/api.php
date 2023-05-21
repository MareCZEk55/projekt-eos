<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('members', [MemberController::class, 'index']);
Route::post('members', [MemberController::class, 'store']);
Route::get('members/{member}', [MemberController::class, 'show']);
Route::put('members/{member}', [MemberController::class, 'update']);
Route::delete('members/{member}', [MemberController::class, 'destroy']);
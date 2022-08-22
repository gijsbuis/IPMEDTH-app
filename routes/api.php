<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Drink;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('drinks', function () {
    return Drink::all();
});

Route::get('users', function () {
    return User::all();
});

Route::get('user/{id}', function (Request $request) {
    return User::find($request);
});

Route::get('/ontkoppelBrillen', function() {
    DB::table('users')->update([
        'toegewezen'=>'Nee',
        'bril_id'=>0
    ]);
});

Route::get('/koppelBril/{id}', function (Request $request) {
    return UserController::KoppelBril($request);
});

// Route::post('koppelBril', [Usercontroller::class, 'KoppelBril']);

// Route::get('/koppelBril', function(Request $request) {
//     DB::table('users')->where('id', $request->id)->update([
//         'toegewezen'=>'Ja',
//         'bril_id'=>$request->bril_id,
//     ]);
// });

// public function KoppelBril(Request $request) {
//     DB::table('users')->where('id', $request->id)->update([
//         'toegewezen'=>'Ja',
//         'bril_id'=>$request->bril_id,
//     ]);
// }

Route::get('bewerkStatus/{id}', [OrderController::class, 'statusBewerken']);

Route::get('/haalDrankjesOp', function (Request $request) {
    return Drink::getDrankjesFromUser($request);
});

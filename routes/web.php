<?php

use Illuminate\Support\Facades\Route;

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
//     return redirect()->route('lucky_wheel');
// });
Route::get('/', function () {
    return view('menugame');
});
Route::get('/adminAEniso@123', function () {
    return view('layout.admin');
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/lucky_wheel', [App\Http\Controllers\LuckyWheelController::class, 'guest'])->name('lucky_wheel');
Route::get('/lucky_card', [App\Http\Controllers\LuckyCardController::class, 'guest'])->name('lucky_card');
Route::get('/lucky_random_number', [App\Http\Controllers\LuckyNumberController::class, 'guest'])->name('lucky_number');
Route::get('/adminAEniso@123/lucky_wheel/color', [App\Http\Controllers\LuckyWheelController::class, 'color'])->name('lucky_wheel.color');
Route::post('/adminAEniso@123/lucky_wheel/color/update', [App\Http\Controllers\LuckyWheelController::class, 'update_color'])->name('lucky_wheel.color.update');
Route::get('/adminAEniso@123/lucky_wheel/list', [App\Http\Controllers\LuckyWheelController::class, 'list'])->name('lucky_wheel.list');
Route::get('/adminAEniso@123/lucky_wheel/delete/{id}', [App\Http\Controllers\LuckyWheelController::class, 'delete_gift'])->name('lucky_wheel.delete');
Route::get('/adminAEniso@123/lucky_wheel/edit/{id}', [App\Http\Controllers\LuckyWheelController::class, 'edit_gift'])->name('lucky_wheel.edit');
Route::post('/adminAEniso@123/lucky_wheel/update/{id}', [App\Http\Controllers\LuckyWheelController::class, 'update_gift'])->name('lucky_wheel.update');
Route::get('/adminAEniso@123/lucky_wheel/create', [App\Http\Controllers\LuckyWheelController::class, 'create_gift'])->name('lucky_wheel.create');
Route::post('/adminAEniso@123/lucky_wheel/store', [App\Http\Controllers\LuckyWheelController::class, 'store_gift'])->name('lucky_wheel.store');
Route::get('/adminAEniso@123/lucky_cart/list', [App\Http\Controllers\LuckyCardController::class, 'list'])->name('lucky_card.list');
Route::get('/adminAEniso@123/lucky_cart/add', [App\Http\Controllers\LuckyCardController::class, 'add'])->name('lucky_card.add');
Route::post('/adminAEniso@123/lucky_cart/create', [App\Http\Controllers\LuckyCardController::class, 'create'])->name('lucky_card.create');
Route::get('/adminAEniso@123/lucky_cart/edit/{id}', [App\Http\Controllers\LuckyCardController::class, 'edit'])->name('lucky_card.edit');
Route::post('/adminAEniso@123/lucky_cart/update/{id}', [App\Http\Controllers\LuckyCardController::class, 'update'])->name('lucky_card.update');
Route::get('/adminAEniso@123/lucky_cart/delete/{id}', [App\Http\Controllers\LuckyCardController::class, 'delete'])->name('lucky_card.delete');
Route::get('/adminAEniso@123/lucky_number/add', [App\Http\Controllers\LuckyNumberController::class, 'add'])->name('lucky_number.add');






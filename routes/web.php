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

Route::get('/', function () {
    return view('add-new');
});

Route::get('save-record', [App\Http\Controllers\AddRecordController::class, 'index'])->name('save.record');
Route::post('save-record', [App\Http\Controllers\AddRecordController::class, 'saveRecord'])->name('save.record.post');
Route::get('/', [App\Http\Controllers\AddRecordController::class, 'showRecords']);
Route::get('/{id}', [App\Http\Controllers\AddRecordController::class, 'deleteRecords'])->name('delete.record.post');


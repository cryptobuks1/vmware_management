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

Auth::routes();

Route::get('/login/azure', '\App\Http\Middleware\AppAzure@azure');
Route::get('/login/azurecallback', '\App\Http\Middleware\AppAzure@azurecallback');
Route::get('/logout/azure', '\App\Http\Middleware\AppAzure@azurelogout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
Route::post('/users/save', [App\Http\Controllers\Admin\UserController::class, 'save'])->name('users.save');
Route::post('/users/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('users.delete');

Route::get('/vm/requirement_classify', [App\Http\Controllers\VmController::class, 'index'])->name('vm.requirement_classify');
Route::get('/vm/getvmdata', [App\Http\Controllers\VmController::class, 'getvmdata'])->name('vm.getvmdata');
Route::get('/vm/getvmreqdata', [App\Http\Controllers\VmController::class, 'getvmreqdata'])->name('vm.getvmreqdata');
Route::post('/vm/editvmreqdata', [App\Http\Controllers\VmController::class, 'editvmreqdata'])->name('vm.editvmreqdata');
Route::post('/vmreq/edit', [App\Http\Controllers\VmController::class, 'editreq'])->name('vmreq.edit');

Route::get('/vm/sizing', [App\Http\Controllers\VmController::class, 'sizing'])->name('vm.sizing');

Route::get('/vm/change_proposal', [App\Http\Controllers\VmController::class, 'change_proposal'])->name('vm.change_proposal');

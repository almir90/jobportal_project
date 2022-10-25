<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PublicController;
use Database\Seeders\Admin;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'is_admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/add/clients', [AdminController::class, 'AdminPostJob'])->name('admin.add_clients');
    Route::post('/admin/post/company', [AdminController::class, 'AdminPostCompany'])->name('admin.post_company');
    Route::get('/admin/client/list', [AdminController::class, 'AdminClientList'])->name('admin.client_list');
    Route::get('/admin/edit/client/{id}', [AdminController::class, 'AdminEditClient'])->name('admin.edit_client');
    Route::post('/admin/update/client/', [AdminController::class, 'AdminUpdateClient'])->name('admin.client_update');
    Route::get('/admin/delete/client/{id}', [AdminController::class, 'AdminDeleteClient'])->name('admin.delete_client');
    Route::get('/admin/job/list/', [AdminController::class, 'AdminJobList'])->name('admin.job_list');
    Route::get('/admin/job/applications/', [AdminController::class, 'AdminJobApplications'])->name('admin.job_applications');
    Route::get('/admin/job/statistics/', [AdminController::class, 'AdminStatistics'])->name('admin.statistics');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/home', 'HomePage')->name('user.home');
    Route::get('/home/add/position', 'UserAddPosition')->name('user.add_position');
    Route::post('/home/store/position', 'UserStorePosition')->name('user.store_position');
    Route::get('/home/list/position/', 'UserListPosition')->name('user.position_list');
    Route::get('/home/edit/position/{id}', 'UserEditPosition')->name('user.edit_position');
    Route::post('/home/update/position/', 'UserUpdatePosition')->name('user.update_position');
    Route::get('/home/update/position/{id}', 'UserDeletePosition')->name('user.delete_position');
    Route::get('/home/application/list', 'UserApplicationList')->name('user.application_list');
});

Route::controller(PublicController::class)->group(function(){
    Route::get('/public/form/page{id}', 'PublicFormPage')->name('public.form_page');
    Route::post('/public/store/application/{id}', 'PublicStoreApplication')->name('public_store.application');
    

});



require __DIR__.'/auth.php';
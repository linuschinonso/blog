<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function(){

Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
 Route::get('/admin/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->middleware('can:view, post')->name('post.edit');
Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');



Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

Route::delete('admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

});

Route::middleware('role:admin')->group(function(){

    
    Route::get('admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('users.role.attach');

    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('users.role.detach');

});


 Route::middleware(['can:view,user'])->group(function(){
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
 });


 
 Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
 Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
 Route::delete('/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
 Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
 Route::put('/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
 Route::put('/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach_permission'])->name('roles.permission.attach');
 Route::put('/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach_permission'])->name('roles.permission.detach');




 Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
 Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
 Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
 Route::delete('/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');
 Route::put('/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');

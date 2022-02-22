<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;

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
//     return view('index');
// });



Auth::routes();

  

Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>['auth','admin']],function()
{
    Route::get('dashboard',[AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile',[AdminDashboardController::class, 'adminProfile'])->name('profile');
     // Route::get('edit-admin-profile',[AdminDashboardController::class, 'editProfile'])->name('edit-profile');
     Route::post('update-profile',[AdminDashboardController::class, 'updateProfile'])->name('update-profile');

     Route::get('user',[UserController::class, 'index'])->name('user');
      Route::get('blog',[BlogController::class, 'index'])->name('blog');
      Route::post('blog-add',[BlogController::class, 'store'])->name('blog-add');
      Route::post('blog-delete',[BlogController::class, 'delete'])->name('blog-delete');
      Route::post('blog-update',[BlogController::class, 'update'])->name('blog-update');

      Route::get('category',[BlogController::class, 'category'])->name('category');
      Route::post('category-add',[BlogController::class, 'addCategory'])->name('category-add');
      Route::post('category-delete',[BlogController::class, 'deleteCategory'])->name('category-delete');
       Route::post('category-update',[BlogController::class, 'categoryUpdate'])->name('category-update');
      Route::post('user-delete',[UserController::class, 'deleteUser'])->name('user-delete');
      
});


Route::group(['prefix'=>'user','as'=>'user.','namespace'=>'User','middleware'=>['auth','user']],function()
{
    Route::get('dashboard',[UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile',[UserDashboardController::class, 'userProfile'])->name('profile');

});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::get('allblog',[HomeController::class, 'allPost'])->name('allblog');
 Route::get('post/{id}',[HomeController::class, 'post'])->name('post');
 Route::post('post-comment',[HomeController::class, 'postComment'])->name('post-comment');
 Route::get('category',[HomeController::class, 'allCategory'])->name('category');

 Route::get('category-list/{id}',[HomeController::class, 'categoryList'])->name('category-list');

 Route::get('search',[HomeController::class, 'search'])->name('search');
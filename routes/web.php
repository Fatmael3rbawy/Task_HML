<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\User\UserAuthController;
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
//     return view('welcome');
// });

  /*
        _____________________ Admin Dashboard Routes __________________________

 */
    //admin login
    Route::get('/AdminLogin', [AuthController::class, "login"])->name('admin.login');
    Route::post('/AdminHandelLogin', [AuthController::class, "handelLogin"])->name('admin.handelLogin');

    Route::group(['middleware' => 'auth:admin'], function () {
        //Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, "index"])->name('admin.index');
        Route::get('/Adminlogout', [AuthController::class, "logout"])->name('admin.logout');

        //Category CRUD
        Route::get('/categories', [CategoryController::class, "index"])->name('category.index');
        Route::get('/category/create', [CategoryController::class, "create"])->name('category.create');
        Route::post('/category/store', [CategoryController::class, "store"])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, "edit"])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, "update"])->name('category.update');
        Route::get('/category/destroy/{id}', [CategoryController::class, "destroy"])->name('category.destroy');

        //products
        Route::get('/products', [ProductController::class, "index"])->name('product.index');
        Route::get('/product/create', [ProductController::class, "create"])->name('product.create');
        Route::post('/product/store', [ProductController::class, "store"])->name('product.store');
   
    });

    

    /*
     _____________________ Site Routes __________________________
    */
    
    //user login
    Route::get('/login', [UserAuthController::class, "login"])->name('login');
    Route::post('/login', [UserAuthController::class, "handelLogin"])->name('handelLogin');
    //Home
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/search',[HomeController::class, 'search'])->name('search');

    Route::group(['middleware' => 'auth'], function () {
       
        // User Favorites 
        Route::post('/addToFavorite/{id}',[FavoriteController::class, 'addFavoriteProduct'])->name('addToFavorite');
        Route::get('/showFavorites',[FavoriteController::class, 'showFavoriteProducts'])->name('showFavorites');
        //Logout
        Route::get('/logout', [UserAuthController::class, "logout"])->name('user.logout');

    });
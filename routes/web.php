<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllTransactionController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CustomerContoller;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\StockController;


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
    //return view('welcome');
    //return view('auth.registration');
    return view('auth.login');
});


    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
    Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
    Route::get('/dashboard', [CustomAuthController::class, 'statbox']);
    Route::get('/calendar-event', [CalenderController::class, 'index']);

    Route::post('/calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);  
    Route::get('/user/profile', [UserController::class,'profile']);
    Route::post('/users/profile', [UserController::class,'update']);
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');
    Route::get('all_transaction', [AllTransactionController::class, 'index'])->name('all_transaction');
    Route::get('all_transaction/fetchall', [AllTransactionController::class, 'fetch_all'])->name('all_transaction.fetch_all');
    Route::get('all_transaction/add', [AllTransactionController::class, 'add'])->name('all_transaction.add');
    Route::post('all_transaction/add_validation', [AllTransactionController::class, 'add_validation'])->name('all_transaction.add_validation');
    Route::get('all_transaction/edit/{id}', [AllTransactionController::class, 'edit'])->name('edit');
    Route::post('all_transaction/edit_validation', [AllTransactionController::class, 'edit_validation'])->name('all_transaction.edit_validation');
    Route::get('all_transaction/show/{id}', [AllTransactionController::class, 'show'])->name('show');
    Route::get('all_transaction/delete/{id}', [AllTransactionController::class, 'delete'])->name('all_transaction.delete');
    Route::get('all_transaction/printpreview', [AllTransactionController::class, 'printpreview'])->name('all_transaction.print');
    Route::get('production', [GraphController::class, 'monthly'])->name('production');
    Route::get('production_yearly', [GraphController::class, 'yearly'])->name('production_yearly');
    Route::get('production_weekly', [GraphController::class, 'weekly'])->name('production_weekly');

    Route::get('depart/{id}/delete',[DepartmentController::class,'destroy']);
    Route::resource('depart',DepartmentController::class);

    
    Route::get('/user-mgt/{name}', [UserManagementController::class, 'show']);
    Route::get('/user-mgt', [UserManagementController::class, 'index']);
    Route::put('/user-mgt/users/{user}', [UserManagementController::class, 'updateUser']);
    Route::patch('/user-mgt/users/{user}', [UserManagementController::class, 'changePassword']);
    Route::post('/user-mgt/toggle-activation/{user}', [UserManagementController::class, 'toggleUserActivation']);

    // customer Resource    
    Route::get('customer/edit/{id}',[CustomerContoller::class,'edit']);
    Route::get('customer/{id}/delete',[CustomerContoller::class,'destroy']);
    Route::get('customer/{id}/delete',[CustomerContoller::class,'destroy']);
    Route::resource('customer',CustomerContoller::class);

    Route::get('/stock', [StockController::class, 'index'])->name('stock');

    Route::get('stock/fetchall', [StockController::class, 'fetch_all'])->name('stock.fetch_all');

    Route::get('stock/add', [StockController::class, 'add'])->name('stock.add');

    Route::post('stock/add_stock', [StockController::class, 'add_stock_fish'])->name('stock.add_stock_fish');

    Route::get('/stock/edit/{id}', [StockController::class, 'edit2'])->name('edit2');

    Route::post('/stock/edit_validation', [StockController::class, 'edit_validation'])->name('stock.edit_validation');

    Route::get('stock/delete/{id}', [StockController::class, 'delete'])->name('stock.delete');

    Route::get('view_admin', [AdminController::class, 'index'])->name('view_admin');

    Route::get('view_admin/fetchall', [AdminController::class, 'fetch_all'])->name('view_admin.fetchall');
});
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Models\Maintenance;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::middleware(['role.redirect'])->group(function(){
        Route::get('/', [UserController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [UserController::class, 'register'])->name('register.submit');

        Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [UserController::class, 'login']);
    });

    Route::get('/dashboard', [CarController::class, 'dashboard'])->name('customer.dashboard');

    // Route::post('/booking', [RentalController::class, 'searchAvailableCars'])->name('customer.booking');

    Route::middleware(['auth'])->group(function(){

        //Dashboard
        Route::get('/admin', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        //For User
        Route::get('/user',[UserController::class, 'index'])->name('users.index'); //Go to list category
        Route::get('/user/create',[UserController::class, 'create'])->name('users.register'); //Go to create category form
        Route::post('/user',[UserController::class, 'store'])->name('users.store'); //Save registered form
        Route::get('/edit-user/{id}',[UserController::class, 'editUserPage'])->name('users.edit'); //Edit form page
        Route::post('/save-edit-user/{id}',[UserController::class, 'modifiedUser'])->name('users.save-edit'); //save edit
        Route::get('/delete-user/{id}',[UserController::class, 'deleteUser'])->name('users.destroy'); //delete selected data

        Route::get('/category',[CategoryController::class, 'index'])->name('categories.index');
        Route::get('/category/create',[CategoryController::class, 'createCategory'])->name('categories.register');
        Route::post('/category',[CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit-category/{id}',[CategoryController::class, 'editCategoryPage'])->name('categories.edit');
        Route::post('/save-edit-category/{id}',[CategoryController::class, 'modifiedCategory'])->name('categories.save-edit');
        Route::get('/delete-category/{id}',[CategoryController::class, 'deleteCategory'])->name('categories.destroy');

        Route::get('/car',[CarController::class, 'index'])->name('cars.index');
        Route::get('/car/create',[CarController::class, 'createCar'])->name('cars.register');
        Route::post('/car',[CarController::class, 'store'])->name('cars.store');
        Route::get('/edit-car/{id}',[CarController::class, 'editCarpage'])->name('cars.edit');
        Route::post('/save-edit-car/{id}',[CarController::class, 'modifyCar'])->name('cars.save-edit');
        Route::get('/delete-car/{id}',[CarController::class, 'deleteCar'])->name('cars.destroy');

        Route::get('/maintenance',[MaintenanceController::class, 'index'])->name('maintenances.index');
        Route::get('/maintenance/create',[MaintenanceController::class, 'createMaintenance'])->name('maintenances.register');
        Route::post('/maintenance',[MaintenanceController::class, 'store'])->name('maintenances.store');
        Route::get('/edit-maintenance/{id}',[MaintenanceController::class, 'editMaintenancePage'])->name('maintenances.edit');
        Route::post('/save-edit-maintenance/{id}',[MaintenanceController::class, 'modifyMaintenance'])->name('maintenances.save-edit');
        Route::get('/delete-maintenance/{id}',[MaintenanceController::class, 'deleteMaintenance'])->name('maintenances.destroy');

        Route::get('/booking',[RentalController::class, 'index'])->name('bookings.index');
        Route::get('/rental/create', [RentalController::class, 'searchAvailableCars'])->name('rentals.search-available-car');
        // Route::get('/rental/create', [RentalController::class, 'searchAvailableCars'])->name('rentals.search-available-car');
        Route::post('/rental', [RentalController::class, 'store'])->name('rentals.store');
        Route::get('/cancel-rental/{id}',[RentalController::class, 'cancel'])->name('rentals.cancel');

        Route::get('/order/{id}', [RentalController::class, 'myOrder'])->name('rentals.my-order');
        Route::get('/payment/{id}', [PaymentController::class, 'paymentPage'])->name('payments.payment-info');
        Route::post('/payment', [PaymentController::class, 'pay'])->name('payments.pay');
        Route::get('/payment-list', [PaymentController::class, 'index'])->name('payments.index');

        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    });
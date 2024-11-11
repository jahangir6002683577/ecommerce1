<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Middleware\TokenVerificationMiddleWare;



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'frontend.layouts.master');
// Route::view('/frontend/home', 'frontend.home');

// Backend

Route::get('/products/list', [UserController::class, 'product_list_page'])->name('product_list');


// frontend

// Route::view('/', 'frontend.home');
Route::view('/', 'components.auth.registration-form');



// dashboard route
Route::get("/summary", [DashboardController::class, 'DashboardPage'])->name('dashboard');


// home route
Route::get('/', [UserController::class, 'user_dashboard']);



// logout route
Route::get('/userLogout', [UserController::class, 'Logout'])->name('user.logout');

Route::post('/user-registration', [UserController::class, 'user_registration']);
Route::get('/Registration', [UserController::class, 'userRegistration_form'])->name('registration_form');
Route::get('/login', [UserController::class, 'LoginPage']);
Route::post('/userLogin', [UserController::class, 'UserLogin']);





// Route::get('/categoryPage', [CategoryController::class, 'category_list']);

Route::middleware(['tokenVerified'])->group(function () {
    Route::view('/dashboard', 'layout.sidenav-layout');

    // category
    Route::post("/create-category", [CategoryController::class, 'CategoryCreate']);
    Route::get("/list-category", [CategoryController::class, 'CategoryList']);
    Route::post("/delete-category", [CategoryController::class, 'CategoryDelete']);
    Route::post("/category-by-id", [CategoryController::class, 'CategoryById']);
    Route::post("/update-category", [CategoryController::class, 'CategoryUpdate']);
    Route::get("/category-page", [CategoryController::class, 'CategoryPage']);

    // customer
    Route::get("/customer-page", [CustomerController::class, 'CustomerPage']);
    Route::get("/customer-list", [CustomerController::class, 'CustomerList']);
    Route::post("/create-customer", [CustomerController::class, 'CustomerCreate']);
    Route::post("/delete-customer", [CustomerController::class, 'CustomerDelete']);
    Route::post("/customer-by-id", [CustomerController::class, 'CustomerByID']);
    Route::post("/update-customer", [CustomerController::class, 'CustomerUpdate']);

    // product
    Route::get("/product-page", [ProductController::class, 'ProductPage']);
    Route::post("/product-create", [ProductController::class, 'ProductCreate']);
    Route::post("/product-by-id", [ProductController::class, 'ProductById']);
    Route::post("/delete-product", [ProductController::class, 'ProductDelete']);
    Route::get("/list-product", [ProductController::class, 'ProductList']);
    Route::post("/update-product", [ProductController::class, 'ProductUpdate']);

    // sales & invoice report
    Route::get("/report-page", [ReportController::class, 'ReportPage']);
    Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'SalesReport']);
    Route::post("/invoice-create", [InvoiceController::class, 'InvoiceCreate']);
    Route::get("/invoice-select", [InvoiceController::class, 'InvoiceSelect']);
    Route::post("/invoice-details", [InvoiceController::class, 'InvoiceDetails']);
    Route::post("/invoice-delete", [InvoiceController::class, 'InvoiceDelete']);
    Route::get('/invoice-page', [InvoiceController::class, 'InvoicePage']);

    Route::get('/sale-page', [InvoiceController::class, 'SalePage']);
});











/* /*$table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('password');
            $table->enum('role', ['admin', 'vendor', 'customer'])->default('customer');
            $table->rememberToken()->nullable();
            $table->timestamps();*/

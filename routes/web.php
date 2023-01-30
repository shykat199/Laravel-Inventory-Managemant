<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PaySalaryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;


//EMPLOYEE ROUTES----------------
Route::resource('/employees',EmployeeController::class);
Route::get('/employees/delete/{id}',[EmployeeController::class,'destroy'])->name('employees.delete');
Route::get('/employees/edit/{id}',[EmployeeController::class,'edit'])->name('employees.edit');
Route::post('/employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');

//Customer Routes-------------------------
Route::get('/customers',[\App\Http\Controllers\CustomerController::class,'index'])->name('customer.index');
Route::get('/customers/create',[\App\Http\Controllers\CustomerController::class,'create'])->name('customer.create');
Route::post('/customers/create',[\App\Http\Controllers\CustomerController::class,'store'])->name('customer.store');
Route::get('/customers/view/{id}',[\App\Http\Controllers\CustomerController::class,'view'])->name('customer.view');
Route::get('/customers/edit/{id}',[\App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customers/store/{id}',[\App\Http\Controllers\CustomerController::class,'update'])->name('customer.store');
Route::get('/customers/delete/{id}',[\App\Http\Controllers\CustomerController::class,'delete'])->name('customer.delete');

//Supplier Routs------------------
Route::get('/supplier',[\App\Http\Controllers\SuplierController::class,'index'])->name('supplier.index');
Route::get('/supplier/create',[\App\Http\Controllers\SuplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/create',[\App\Http\Controllers\SuplierController::class,'store'])->name('supplier.store');
Route::get('/supplier/view/{id}',[\App\Http\Controllers\SuplierController::class,'view'])->name('supplier.view');
Route::get('/supplier/edit/{id}',[\App\Http\Controllers\SuplierController::class,'edit'])->name('supplier.edit');
Route::post('/supplier/store/{id}',[\App\Http\Controllers\SuplierController::class,'update'])->name('supplier.update');
Route::get('/supplier/delete/{id}',[\App\Http\Controllers\SuplierController::class,'delete'])->name('supplier.delete');


//Advance Salary Routs -----------------------
Route::resource('/salaries',SalaryController::class);

//Pay Total Salary Routs -----------------------
Route::resource('/pay_salaries',PaySalaryController::class);

//Category Routs ----------------------
Route::resource('/categories',CategoryController::class);

//Product Routs ----------------------
Route::resource('/products',ProductController::class);
Route::get('/product/massInput',[ProductController::class,'massInput'])->name('product.massInput');
Route::get('/product/export',[ProductController::class,'export'])->name('product.export');
Route::post('/product/import',[ProductController::class,'import'])->name('product.import');

//Expense Routs ----------------------
$mouth=date('F');
$year=date('Y');
Route::get('/expenses/all_expenses',[ExpensesController::class,'index'])->name('expenses.index');
Route::get('/expenses/create',[ExpensesController::class,'create'])->name('expenses.create');
Route::post('/expenses/store',[ExpensesController::class,'store'])->name('expenses.store');
Route::get('/expenses/edit/{id}',[ExpensesController::class,'edit'])->name('expenses.edit');
Route::post('/expenses/update/{id}',[ExpensesController::class,'update'])->name('expenses.update');
Route::get('/expenses/delete/{id}',[ExpensesController::class,'destroy'])->name('expenses.destroy');
Route::get('/expenses/month',[ExpensesController::class,'monthly'])->name('expenses.month');
Route::get('/expenses/yearly/' . $year,[ExpensesController::class,'yearly'])->name('expenses.year');


//POS Routes -----------------
Route::resource('/pos',POSController::class);
Route::post('/pos/add-cart',[POSController::class,'addToCart'])->name('pos.add_cart');
Route::post('/pos/add-cart/update/{rowId}',[POSController::class,'update'])->name('pos.cart-update');
Route::get('/pos/add-cart/delete/{rowId}',[POSController::class,'destroy'])->name('pos.product-delete');
Route::post('/pos/create/invoice',[POSController::class,'createInvoice'])->name('pos.create-invoice');
Route::post('/pos/create/final-invoice',[POSController::class,'createFinalInvoice'])->name('pos.create-final-invoice');

//Attendance Routs -----------------
Route::resource('/attendance',AttendenceController::class);
Route::get('/attendance/edit/{edit_date}',[AttendenceController::class,'edit'])->name('attendance.edit');
Route::post('/attendance/update',[AttendenceController::class,'update'])->name('attendance.update');

//Orders Routes-----------------
Route::resource('/orders',OrderController::class);
Route::get('/orders/{id}',[OrderController::class,'show']);
Route::get('/orders/update/{id}',[OrderController::class,'update']);
Route::get('/approve/order',[OrderController::class,'approveOrder'])->name('approve.order');


//Setting Routs---------------------
Route::resource('/settings',SettingController::class);
Route::get('/setting/update',[SettingController::class,'show'])->name('setting.show');
Route::post('/setting/update/{id}',[SettingController::class,'update'])->name('setting.update');


//Route::controller(SettingController::class)->prefix('settings')->name('settings')->group(function (){
//    Route::get('/setting','index')->name('index');
//    Route::get('/setting/create','create')->name('create');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


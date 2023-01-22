<?php

use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Advancesalarycontroller;
use App\Http\Controllers\Attendensecontroller;
use App\Http\Controllers\Auth\User\Logincontroller;
use App\Http\Controllers\Auth\User\Registercontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Employeecontroller;
use App\Http\Controllers\Expensecontroller;
use App\Http\Controllers\Home\Homecontroller;
use App\Http\Controllers\Poscontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Settingcontroller;
use App\Http\Controllers\Suppliercontroller;
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

Route::get('/login', [Logincontroller::class, 'login'])->name('login');
Route::get('/register', [Registercontroller::class, 'register'])->name('register');
Route::post('/post_register', [Registercontroller::class, 'post_register'])->name('post_register');
Route::post('/post_login', [Logincontroller::class, 'post_login'])->name('post_login');

Route::get('/logout', [Logincontroller::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    //employee route 
    Route::get('/', [Homecontroller::class, 'homepage'])->name('homepage');
    Route::get('/allemployee', [Employeecontroller::class, 'allemployee'])->name('allemployee');
    Route::get('/addemployee', [Employeecontroller::class, 'addemployee'])->name('addemployee');
    Route::post('/employee_form', [Employeecontroller::class, 'employee_form'])->name('employee_form');
    Route::get('/edit_employee/{id}', [Employeecontroller::class, 'edit_employee'])->name('edit_employee');
    Route::post('/update_employee/{id}', [Employeecontroller::class, 'update_employee'])->name('update_employee');
    Route::get('/delete_employee/{id}', [Employeecontroller::class, 'delete_employee'])->name('delete_employee');

    // customer route
    Route::get('/addcustomer', [Customercontroller::class, 'addcustomer'])->name('addcustomer');
    Route::post('/customer_form', [Customercontroller::class, 'customer_form'])->name('customer_form');
    Route::get('/allcustomer', [Customercontroller::class, 'allcustomer'])->name('allcustomer');
    Route::get('/customerdetails/{id}', [Customercontroller::class, 'customerdetails'])->name('customerdetails');
    Route::get('/edit_customer/{id}', [Customercontroller::class, 'edit_customer'])->name('edit_customer');
    Route::post('/update_customer/{id}', [Customercontroller::class, 'update_customer'])->name('update_customer');
    Route::get('/delete_customer/{id}', [Customercontroller::class, 'delete_customer'])->name('delete_customer');

    // supplier route

    Route::get('/addsupplier', [Suppliercontroller::class, 'addsupplier'])->name('addsupplier');
    Route::post('/supplier_form', [Suppliercontroller::class, 'supplier_form'])->name('supplier_form');
    Route::get('/allsupplier', [Suppliercontroller::class, 'allsupplier'])->name('allsupplier');
    Route::get('/supplierdetails/{id}', [Suppliercontroller::class, 'supplierdetails'])->name('supplierdetails');
    Route::get('/edit_supplier/{id}', [Suppliercontroller::class, 'edit_supplier'])->name('edit_supplier');
    Route::post('/update_supplier/{id}', [Suppliercontroller::class, 'update_supplier'])->name('update_supplier');
    Route::get('/delete_supplier/{id}', [Suppliercontroller::class, 'delete_supplier'])->name('delete_supplier');

    // salary route
    Route::get('/add_advance_salary', [Advancesalarycontroller::class, 'add_advance_salary'])->name('add_advance_salary');
    Route::post('/insert_advance_salary', [Advancesalarycontroller::class, 'insert_advance_salary'])->name('insert_advance_salary');
    Route::get('/all_advance_salary', [Advancesalarycontroller::class, 'all_advance_salary'])->name('all_advance_salary');
    Route::get('/pay_salary', [Advancesalarycontroller::class, 'pay_salary'])->name('pay_salary');
    Route::get('/confirm_salary_payment/{id}', [Advancesalarycontroller::class, 'confirm_salary_payment'])->name('confirm_salary_payment');
    Route::post('/insert_salary/{id}', [Advancesalarycontroller::class, 'insertsalary'])->name('insert_salary');

    // category route
    Route::get('/add_category', [Categorycontroller::class, 'add_category'])->name('add_category');
    Route::get('/all_category', [Categorycontroller::class, 'all_category'])->name('all_category');
    Route::post('/insert_category', [Categorycontroller::class, 'insert_category'])->name('insert_category');
    Route::get('/delete_category/{id}', [Categorycontroller::class, 'delete_category'])->name('delete_category');

    // product route
    Route::get('/add_product', [Productcontroller::class, 'add_product'])->name('add_product');
    Route::get('/all_product', [Productcontroller::class, 'all_product'])->name('all_product');
    Route::post('/insert_product', [Productcontroller::class, 'insert_product'])->name('insert_product');

    // expense route
    Route::get('/add_expense', [Expensecontroller::class, 'add_expense'])->name('add_expense');
    Route::get('/all_expense', [Expensecontroller::class, 'all_expense'])->name('all_expense');
    Route::post('/insert_expense', [Expensecontroller::class, 'insert_expense'])->name('insert_expense');
    Route::get('/today_expense', [Expensecontroller::class, 'today_expense'])->name('today_expense');
    Route::get('/this_month_expense', [Expensecontroller::class, 'this_month_expense'])->name('this_month_expense');
    Route::post('/monthly_expense', [Expensecontroller::class, 'monthly_expense'])->name('monthly_expense');

    Route::get('/yearly_expense', [Expensecontroller::class, 'yearly_expense'])->name('yearly_expense');
    Route::post('/find_yearly_expense', [Expensecontroller::class, 'find_yearly_expense'])->name('find_yearly_expense');

    // attendense route
    Route::get('/take_attendense', [Attendensecontroller::class, 'take_attendense'])->name('take_attendense');
    Route::get('/all_attendense', [Attendensecontroller::class, 'all_attendense'])->name('all_attendense');
    Route::post('/inser_attendense', [Attendensecontroller::class, 'inser_attendense'])->name('inser_attendense');
    Route::post('/find_attendense', [Attendensecontroller::class, 'find_attendense'])->name('find_attendense');
    Route::get('/edit_attendense/{id}', [Attendensecontroller::class, 'edit_attendense'])->name('edit_attendense');
    Route::post('/update_attendense/{id}', [Attendensecontroller::class, 'update_attendense'])->name('update_attendense');

    // setting route

    Route::get('/edit_setting', [Settingcontroller::class, 'edit_setting'])->name('edit_setting');
    Route::post('/update_setting', [Settingcontroller::class, 'update_setting'])->name('update_setting');

    // import export
    // Route::get('/import_export', [Productcontroller::class, 'import_export'])->name('import_export');
    // Route::get('/exel_export', [Productcontroller::class, 'exel_export'])->name('exel_export');
   
    // pos route
    Route::get('/pos', [Poscontroller::class, 'pos'])->name('pos');
    Route::post('/add_cart', [Poscontroller::class, 'add_cart'])->name('add_cart');
    Route::post('/update_cart_qtty/{id}', [Poscontroller::class, 'update_cart_qtty'])->name('update_cart_qtty');
    Route::get('/delete_cart/{id}', [Poscontroller::class, 'delete_cart'])->name('delete_cart');
    Route::get('/invoice', [Poscontroller::class, 'invoice'])->name('invoice');
    Route::post('/final_invoice', [Poscontroller::class, 'final_invoice'])->name('final_invoice');


    // orders route
    Route::get('/new_order', [Poscontroller::class, 'new_order'])->name('new_order');
    Route::get('/all_order', [Poscontroller::class, 'all_order'])->name('all_order');
    Route::get('/complete_order/{id}', [Poscontroller::class, 'complete_order'])->name('complete_order');
    Route::get('/delete_order/{id}', [Poscontroller::class, 'delete_order'])->name('delete_order');
    
});


<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReturnsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UnitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/index', [HomeController::class, 'index']);


Route::group(['middleware' => 'api'], function () {
    Route::get('/gestiondescomptes', [UserController::class, 'gestiondescomptes'])->name('api.gestiondescomptes');
    Route::get('/roleindex', [RoleController::class, 'roleindex'])->name('api.roleindex');
    Route::get('/role/create', [RoleController::class, 'rolecreate'])->name('api.rolecreate');
    Route::post('/role/store', [RoleController::class, 'rolestore'])->name('api.rolestore');
    Route::delete('/delete/role/{id}', [RoleController::class, 'deleterole'])->name('api.deleterole');
    Route::get('/edit/user/{id}', [UserController::class, 'edituser'])->name('api.edituser');
    Route::put('/update/user/{id}', [UserController::class, 'updateuser'])->name('api.updateuser');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    Route::group(['prefix' => 'city'], function () {
        Route::get('/index', [CityController::class, 'index'])->name('city.index');
        Route::post('/store', [CityController::class, 'store'])->name('city.store');
        Route::get('/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
        Route::post('/update/{id}', [CityController::class, 'update'])->name('city.update');
        Route::delete('/destroy/{id}', [CityController::class, 'destroy'])->name('city.destroy');
    });
    Route::group(['prefix' => 'country'], function () {
        Route::get('/index', [CountryController::class, 'index'])->name('country.index');
        Route::post('/store', [CountryController::class, 'store'])->name('country.store');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::post('/update/{id}', [CountryController::class, 'update'])->name('country.update');
        Route::delete('/destroy/{id}', [CountryController::class, 'destroy'])->name('country.destroy');
    });
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('customer.index');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('customer.index');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
    Route::group(['prefix' => 'discount'], function () {
        Route::get('/index', [DiscountController::class, 'index'])->name('discount.index');
        Route::post('/store', [DiscountController::class, 'store'])->name('discount.store');
        Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('discount.edit');
        Route::post('/update/{id}', [DiscountController::class, 'update'])->name('discount.update');
        Route::delete('/destroy/{id}', [DiscountController::class, 'destroy'])->name('discount.destroy');
    });
    Route::group(['prefix' => 'expense'], function () {
        Route::get('/index', [ExpenseController::class, 'index'])->name('expense.index');
        Route::post('/store', [ExpenseController::class, 'store'])->name('expense.store');
        Route::get('/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
        Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
        Route::delete('/destroy/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
    });
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/index', [PaymentController::class, 'index'])->name('payment.index');
        Route::post('/store', [PaymentController::class, 'store'])->name('payment.store');
        Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
        Route::post('/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
        Route::delete('/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/index', [POSController::class, 'index'])->name('order.index');
        Route::post('/store', [POSController::class, 'store'])->name('order.store');
        Route::get('/edit/{id}', [POSController::class, 'edit'])->name('order.edit');
        Route::post('/update/{id}', [POSController::class, 'update'])->name('order.update');
        Route::delete('/destroy/{id}', [POSController::class, 'destroy'])->name('order.destroy');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    Route::group(['prefix' => 'purchase'], function () {
        Route::get('/index', [ProductController::class, 'index'])->name('purchase.index');
        Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
        Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
        Route::post('/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update');
        Route::delete('/destroy/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
    });
    Route::group(['prefix' => 'return'], function () {
        Route::get('/index', [ReturnsController::class, 'index'])->name('return.index');
        Route::post('/store', [ReturnsController::class, 'store'])->name('return.store');
        Route::get('/edit/{id}', [ReturnsController::class, 'edit'])->name('return.edit');
        Route::post('/update/{id}', [ReturnsController::class, 'update'])->name('return.update');
        Route::delete('/destroy/{id}', [ReturnsController::class, 'destroy'])->name('return.destroy');
    });
    Route::group(['prefix' => 'sale'], function () {
        Route::get('/index', [SaleController::class, 'index'])->name('sale.index');
        Route::post('/store', [SaleController::class, 'store'])->name('sale.store');
        Route::get('/edit/{id}', [SaleController::class, 'edit'])->name('sale.edit');
        Route::post('/update/{id}', [SaleController::class, 'update'])->name('sale.update');
        Route::delete('/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');
    });
    Route::group(['prefix' => 'stockadjustment'], function () {
        Route::get('/index', [StockAdjustmentController::class, 'index'])->name('stockadjustment.index');
        Route::post('/store', [StockAdjustmentController::class, 'store'])->name('stockadjustment.store');
        Route::get('/edit/{id}', [StockAdjustmentController::class, 'edit'])->name('stockadjustment.edit');
        Route::post('/update/{id}', [StockAdjustmentController::class, 'update'])->name('stockadjustment.update');
        Route::delete('/destroy/{id}', [StockAdjustmentController::class, 'destroy'])->name('stockadjustment.destroy');
    });
    Route::group(['prefix' => 'store'], function () {
        Route::get('/index', [StoreController::class, 'index'])->name('store.index');
        Route::post('/store', [StoreController::class, 'store'])->name('store.store');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
        Route::post('/update/{id}', [StoreController::class, 'update'])->name('store.update');
        Route::delete('/destroy/{id}', [StoreController::class, 'destroy'])->name('store.destroy');
    });
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
        Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });
    Route::group(['prefix' => 'transfer'], function () {
        Route::get('/index', [TransferController::class, 'index'])->name('transfer.index');
        Route::post('/store', [TransferController::class, 'store'])->name('transfer.store');
        Route::get('/edit/{id}', [TransferController::class, 'edit'])->name('transfer.edit');
        Route::post('/update/{id}', [TransferController::class, 'update'])->name('transfer.update');
        Route::delete('/destroy/{id}', [TransferController::class, 'destroy'])->name('transfer.destroy');
    });
    Route::group(['prefix' => 'unit'], function () {
        Route::get('/index', [UnitController::class, 'index'])->name('unit.index');
        Route::post('/store', [UnitController::class, 'store'])->name('unit.store');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
        Route::post('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
        Route::delete('/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
    });
});
Route::get('/signup', [UserController::class, 'registerpage'])->name('registerpage');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/signin', [UserController::class, 'loginpage'])->name('loginpage');
Route::post('/login', [UserController::class, 'login'])->name('login');

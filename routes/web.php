<?php

// use Illuminate\Support\Facades\Route;

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Livewire\Dashboard;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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
//     return view('dashboard');
// })->middleware('auth');

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/', Dashboard::class)->name("dashboard");
    Route::get('dashboard', Dashboard::class)->name("dashboard");
    Route::group(['namespace' => "App\Http\Livewire\Supplier"], function () {
        Route::any('supplier', Index::class)->name("supplier");
    });
    Route::group(['namespace' => "App\Http\Livewire\Category"], function () {
        Route::any('category', Index::class)->name("category");
    });
    Route::group(['namespace' => "App\Http\Livewire\CategoryType"], function () {
        Route::get('category-type', Index::class)->name("category.type");
        Route::get('categories/{id}', Categories::class)->name("categories");
    });
    Route::group(['namespace' => "App\Http\Livewire\Purchase"], function () {
        Route::get('purchase', Index::class)->name("purchase");
    });
    Route::group(['namespace' => "App\Http\Livewire\Sale"], function () {
        Route::get('sale', Create::class)->name("sale");
    });
    Route::group(['namespace' => "App\Http\Livewire\Bill"], function () {
        Route::get('bill', Index::class)->name("bill");
        Route::get('bill-create', Create::class)->name("bill.create");
        Route::get('purchase-bill', PurchaseBill::class)->name("purchase-bill");
    });
    Route::group(['namespace' => "App\Http\Livewire\Store"], function () {
        Route::get('store', Index::class)->name("store");
    });
    Route::group(['namespace' => "App\Http\Controllers"], function () {
        Route::resource('posts', PostController::class);
    });
    Route::get('posts-readAll', [App\Http\Controllers\PostController::class, 'readAll'])->name('posts.readAll');
    Route::get('all', function () {
        $brands = Category::select('id', 'name', 'category_type')
            ->with('categoryType:id,name')
            ->get();
        return $brands;
    });
});

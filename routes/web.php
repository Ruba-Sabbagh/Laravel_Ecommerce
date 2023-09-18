<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
 
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


//Route::get('/counter', Counter::class);

Route::get('/', function () {
    return view('home/userpage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/homepage', [HomeController::class, 'redirect'])->name('homepage');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'AdminDashboard')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all-category', 'Index')->name('allcategory');
        Route::post('/add-category', 'AddCategory')->name('addcategory'); // لما يكون في فورم للتخزين
        Route::post('/edit-category', 'EditCategory')->name('editcategory');
        Route::post('/delete-category', 'DeleteCategory')->name('deletecategory');
        
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/add-subcategory', 'AddSubCategory')->name('addsubcategory');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all-product', 'Index')->name('allproduct');//href="{{route('allproduct')}}"
        Route::get('/add-product', 'AddProduct')->name('addproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/pending-order', 'Index')->name('pendingorder');
        Route::get('/completed-order', 'CompletedOrder')->name('completedorder');
        Route::get('/cancel-order', 'CancelOrder')->name('cancelorder');
    });

});

require __DIR__.'/auth.php';

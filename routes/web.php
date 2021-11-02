<?php

use App\Http\Controllers\Admin as ControllersAdmin;
use App\Http\Controllers\Administrators;
use App\Http\Controllers\Category;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Images;
use App\Http\Controllers\Index;
use App\Http\Controllers\SubCategory;
use App\Http\Middleware\Admin;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('admin')->middleware(Admin::class)->group( function() {
    //INDEX
    Route::get('/', [ControllersAdmin::class, 'index'])->name('stephane.admin.index');
    Route::get('/add', [ControllersAdmin::class, 'add'])->name('stephane.admin.index.add');
    Route::post('/add', [ControllersAdmin::class, 'store'])->name('stephane.admin.index.store');
    Route::get('/remove/{id}', [ControllersAdmin::class, 'remove'])->name('stephane.admin.index.remove');


    //CATEGORIES
    Route::get('/categories', [Category::class, 'index'])->name('stephane.admin.categories.index');
    Route::get('/categories/new', [Category::class, 'new'])->name('stephane.admin.categories.new');
    Route::post('/categories/store', [Category::class, 'store'])->name('stephane.admin.categories.store');
    Route::get('/categories/edit/{id}', [Category::class, 'edit'])->name('stephane.admin.categories.edit');
    Route::post('/categories/storeEdit', [Category::class, 'storeEdit'])->name('stephane.admin.categories.storeEdit');
    Route::get('/categories/delete/{id}', [Category::class, 'delete'])->name('stephane.admin.categories.delete');
    Route::get('/categories/unset/{id}', [Category::class, 'unset'])->name('stephane.admin.categories.unset');


    //SUB_CATEGORIES
    Route::get('/sub-categories', [SubCategory::class, 'index'])->name('stephane.admin.subcategories.index');
    Route::get('/sub-categories/new', [SubCategory::class, 'new'])->name('stephane.admin.subcategories.new');
    Route::post('/sub-categories/store', [SubCategory::class, 'store'])->name('stephane.admin.subcategories.store');
    Route::get('/sub-categories/edit/{id}', [SubCategory::class, 'edit'])->name('stephane.admin.subcategories.edit');
    Route::post('/sub-categories/storeEdit', [SubCategory::class, 'storeEdit'])->name('stephane.admin.subcategories.storeEdit');
    Route::get('/sub-categories/delete/{id}', [SubCategory::class, 'delete'])->name('stephane.admin.subcategories.delete');
    Route::get('/sub-categoires/unset/{id}', [SubCategory::class, 'unset'])->name('stephane.admin.subcategories.unset');


    //IMAGES
    Route::get('/images', [Images::class, 'index'])->name('stephane.admin.images.index');
    Route::get('/images/new', [Images::class, 'new'])->name('stephane.admin.images.new');
    Route::post('/images/store', [Images::class, 'store'])->name('stephane.admin.images.store');
    Route::get('/images/edit/{id}', [Images::class, 'edit'])->name('stephane.admin.images.edit');
    Route::post('/images/storeEdit', [Images::class, 'storeEdit'])->name('stephane.admin.images.storeEdit');
    Route::get('/images/delete/{id}', [Images::class, 'delete'])->name('stephane.admin.images.delete');
    Route::get('/images/unset/{id}', [Images::class, 'unset'])->name('stephane.admin.images.unset');


    //ADMINISTRATEURS
    Route::get('/administrators', [Administrators::class, 'index'])->name('stephane.admin.administrators.index');


    //COMMENTS
    Route::get('/comments', [Comments::class, 'index'])->name('stephane.admin.comments.index');

});


Route::get('/', [Index::class, 'index'])->name('stephane.index');
Route::get('/photography/{categoryName}', [Index::class, 'category'])->name('stephane.front.category.index');
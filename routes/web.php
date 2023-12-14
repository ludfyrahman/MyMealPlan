<?php

use App\Http\Controllers\BackOffice\AbsensiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\BackOffice\UserController;
use App\Http\Controllers\BackOffice\CategoryController;
use App\Http\Controllers\BackOffice\RecipeCategoryController;
use App\Http\Controllers\BackOffice\ArticleController;
use App\Http\Controllers\BackOffice\SubCategoryController;
use App\Http\Controllers\BackOffice\RecipeController;
use App\Http\Controllers\BackOffice\ConsultationController;
use App\Http\Controllers\BackOffice\PasienController;
use App\Http\Controllers\SiteController;
use App\Models\Voucher;

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
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::middleware(['auth',  'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [UserController::class, 'profile'])->name('profile');
    Route::get('/standart', [SiteController::class, 'standart'])->name('standart');
    // make standart create
    Route::get('/standart/create', [SiteController::class, 'create'])->name('standart.create');
    // make standart store
    Route::post('/standart/store', [SiteController::class, 'store'])->name('standart.store');
    // make porsi route
    Route::get('/porsi', [SiteController::class, 'porsi'])->name('porsi');
    // make delete standart
    Route::get('/standart/delete/{standart}', [SiteController::class, 'deleteStandart'])->name('standart.delete');
    Route::post('/profil', [UserController::class, 'updateProfile']);
    Route::post('/saveData', [SiteController::class, 'saveData'])->name('saveData');
    Route::resource('pasien', PasienController::class);
    // route print pasien
    Route::get('/pasien/print/{consultation}', [PasienController::class, 'print'])->name('consultation.print');
    Route::resource('consultation', ConsultationController::class);
    Route::resource('user', UserController::class);
    // make route action user
    Route::get('/user/action/{user}/{status}', [UserController::class, 'action'])->name('user.action');
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::get('/sub_category_detail/{id}', [SubCategoryController::class, 'detail'])->name('subCategoryDetail');
    Route::resource('article', ArticleController::class);
    Route::resource('recipe_category', RecipeCategoryController::class);
    Route::resource('recipe', RecipeController::class);
});

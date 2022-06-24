<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\Admin\adsController;
use App\Http\Controllers\SitemapXmlController;
use App\Http\Controllers\Admin\postsController;
use App\Http\Controllers\Admin\videosController;
use App\Http\Controllers\User\frontEndController;
use App\Http\Controllers\Admin\suppliersController;
use App\Http\Controllers\Admin\categoriesController;
use App\Http\Controllers\Admin\subCategoriesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



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

Auth::routes();


Route::get('/register', function () {
    return view('auth.login');
});


// ==================================================================
Route::middleware(['auth'])->prefix('admin')->group(function ()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('categories')->group(function()
    {
        Route::get('/', [categoriesController::class, 'index'])->name('categories.index');
        Route::get('/create', [categoriesController::class, 'create'])->name('categories.create');
        Route::post('/store', [categoriesController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [categoriesController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [categoriesController::class, 'update'])->name('categories.update');
        Route::delete('/delete', [categoriesController::class, 'delete'])->name('categories.delete');
        Route::get('/softDelete', [categoriesController::class, 'softDelete'])->name('categories.softDelete');
        Route::delete('/restore', [categoriesController::class, 'restore'])->name('categories.restore');
    });

    Route::prefix('subCategories')->group(function()
    {
        Route::get('/', [subCategoriesController::class, 'index'])->name('subCategories.index');
        Route::get('/create', [subCategoriesController::class, 'create'])->name('subCategories.create');
        Route::post('/store', [subCategoriesController::class, 'store'])->name('subCategories.store');
        Route::get('/edit/{id}', [subCategoriesController::class, 'edit'])->name('subCategories.edit');
        Route::post('/update/{id}', [subCategoriesController::class, 'update'])->name('subCategories.update');
        Route::delete('/delete', [subCategoriesController::class, 'delete'])->name('subCategories.delete');
        Route::get('/softDelete', [subCategoriesController::class, 'softDelete'])->name('subCategories.softDelete');
        Route::delete('/restore', [subCategoriesController::class, 'restore'])->name('subCategories.restore');
    });

    Route::prefix('posts')->group(function()
    {
        Route::get('/', [postsController::class, 'index'])->name('posts.index');
        Route::get('/create', [postsController::class, 'create'])->name('posts.create');
        Route::get('/subCategories', [postsController::class, 'subCategories'])->name('posts.subCategories');
        Route::post('/store', [postsController::class, 'store'])->name('posts.store');
        Route::get('/show/{id}', [postsController::class, 'show'])->name('posts.show');
        Route::get('/edit/{id}', [postsController::class, 'edit'])->name('posts.edit');
        Route::post('/update/{id}', [postsController::class, 'update'])->name('posts.update');
        Route::delete('/delete', [postsController::class, 'delete'])->name('posts.delete');
        Route::get('/softDelete', [postsController::class, 'softDelete'])->name('posts.softDelete');
        Route::delete('/restore', [postsController::class, 'restore'])->name('posts.restore');
    });

    Route::prefix('Ads')->group(function()
    {
        Route::get('/', [adsController::class, 'index'])->name('Ads.index');
        Route::get('/create', [adsController::class, 'create'])->name('Ads.create');
        Route::get('/subCategories', [adsController::class, 'subCategories'])->name('Ads.subCategories');
        Route::post('/store', [adsController::class, 'store'])->name('Ads.store');
        Route::get('/edit/{id}', [adsController::class, 'edit'])->name('Ads.edit');
        Route::post('/update/{id}', [adsController::class, 'update'])->name('Ads.update');
        Route::delete('/delete', [adsController::class, 'delete'])->name('Ads.delete');
    });

     Route::prefix('Videos')->group(function()
    {
        Route::get('/', [videosController::class, 'index'])->name('Videos.index');
        Route::get('/create', [videosController::class, 'create'])->name('Videos.create');
        Route::get('/subCategories', [videosController::class, 'subCategories'])->name('Videos.subCategories');
        Route::post('/store', [videosController::class, 'store'])->name('Videos.store');
        Route::get('/edit/{id}', [videosController::class, 'edit'])->name('Videos.edit');
        Route::post('/update/{id}', [videosController::class, 'update'])->name('Videos.update');
        Route::delete('/delete', [videosController::class, 'delete'])->name('Videos.delete');
    });



});
// ==================================================================
// START FRONT END ROUTS
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function ()
    {
        Route::get('/', [frontEndController::class, 'welcome'])->name('welcome.frontEnd');
        Route::get('/category_posts/{id}', [frontEndController::class, 'category_posts'])->name('category_posts.frontEnd');
        Route::get('/post/{id}', [frontEndController::class, 'post'])->name('post.frontEnd');
        Route::post('/search', [frontEndController::class, 'search'])->name('search.frontEnd');
                Route::get('/video/{id}', [frontEndController::class, 'video'])->name('video.frontEnd');


    });


    Route::get('feed', [RssFeedController::class, 'feed']);
    Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);
// END FRONT END ROUTES



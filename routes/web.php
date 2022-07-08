<?php

use App\Http\Controllers\Fontend\AddCartController;
use App\Http\Controllers\Fontend\AllShow;
use App\Http\Controllers\SocialLogin;
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
//     return view('fontend/home');
// });

Route::get('/googlegoto', [SocialLogin::class, 'gogglegoto'])->name('googlegoto');
Route::get('/google/login', [SocialLogin::class, 'goggleinfostore']);

Route::get('/', [AllShow::class, 'frontcatshow'])->name('frontcatshow');
Route::get('/singleproducts/{id}', [AllShow::class, 'singleproducts'])->name('singleproducts');
Route::get('/userregister', function () {
    return view('fontend/register');
});

Route::get('/userlogin', function () {
    return view('fontend/login');
});

Route::get('/admin', function () {
    return view('backend.admindashboard');
})->middleware(['auth'])->name('dashboard');



Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('createproduct');

        Route::post('/insert', 'App\Http\Controllers\Backend\ProductController@store')->name('insert');

        Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('manage');

        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('edit');

        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('update');

        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@delete')->name('delete');
    });


    Route::group(['prefix' => '/category'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('catcreate');

        Route::post('/catinsert', 'App\Http\Controllers\Backend\CategoryController@store')->name('catinsert');

        Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('catmanage');

        Route::get('/catshow', 'App\Http\Controllers\Backend\CategoryController@catshow')->name('catshow');

        Route::get('/catedit/{id}', 'App\Http\Controllers\Backend\CategoryController@catedit')->name('catedit');

        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('catupdate');

        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@delete')->name('catdelete');
    });

    Route::group(['prefix' => '/subcategory'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\SubCategoryController@create')->name('subcategorycreate');

        Route::post('/catinsert', 'App\Http\Controllers\Backend\SubCategoryController@store')->name('subcategoryinsert');

        Route::get('/manage', 'App\Http\Controllers\Backend\SubCategoryController@index')->name('subcategorymanage');

        Route::get('/catshow', 'App\Http\Controllers\Backend\SubCategoryController@show')->name('subcategoryshow');

        Route::get('/catedit/{id}', 'App\Http\Controllers\Backend\SubCategoryController@edit')->name('subcategoryedit');

        Route::post('/update/{id}', 'App\Http\Controllers\Backend\SubCategoryController@update')->name('subcategoryupdate');

        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SubCategoryController@delete')->name('subcategorydelete');
    });


    Route::group(['prefix' => '/item'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\ItemsController@create')->name('item.create');

        Route::post('/insert', 'App\Http\Controllers\Backend\ItemsController@store')->name('item.store');

        Route::get('/manage', 'App\Http\Controllers\Backend\ItemsController@index')->name('item.manage');

        Route::get('/show', 'App\Http\Controllers\Backend\ItemsController@show')->name('item.show');

        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ItemsController@edit')->name('item.edit');

        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ItemsController@update')->name('item.update');

        Route::post('/update/singleImage/{id}', 'App\Http\Controllers\Backend\ItemsController@updatesingleImage')->name('item.single.update');

        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ItemsController@delete')->name('item.delete');

        Route::get('/delete/image/{id}', 'App\Http\Controllers\Backend\ItemsController@deletesingleImage')->name('item.image.delete');
    });
});


Route::group(['prefix' => '/cart'], function () {
    // Route::post('/add', 'App\Http\Controllers\Fontend\AddCartController@store')->name('add');

    Route::post('/add', [AddCartController::class, 'store'])->name('add');
});

require __DIR__ . '/auth.php';

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
});
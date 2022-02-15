<?php

Auth::routes();

// Frontend Route
Route::group([
        'namespace'=>'front',
        'prefix'=> LaravelLocalization::setLocale(),
        'middleware'=>[
            'localizationRedirect',
            'localeSessionRedirect'
        ],
        'as'=>'front.'], function (){

    Route::get('/sitemap.xml', 'indexController@sitemap');
       Route::get('/', 'indexController@index')->name('index');
       Route::get('/lang/{lang}', 'indexController@lang')->name('lang');
       Route::post('/offer', 'indexController@offer')->name('offer');
    //    PAGE Route
       Route::group(['namespace'=>'page', 'as'=>'page.'], function (){

           // tr => sayfa
           // en => page şeklinde olmasını istiyorum
           Route::get(LaravelLocalization::transRoute('routes.page'), 'indexController@index')->name('index');
       });
       Route::group(['namespace'=>'service', 'as'=>'service.'], function (){
           Route::get(LaravelLocalization::transRoute('routes.service'), 'indexController@index')->name('index');
       });
    //   Blog Route
       Route::group(['namespace'=>'blog', 'as'=>'blog.'], function (){
           Route::get(LaravelLocalization::transRoute('routes.blog'), 'indexController@index')->name('index');
           Route::get(LaravelLocalization::transRoute('routes.blog_category'), 'indexController@category')->name('category');
           Route::get(LaravelLocalization::transRoute('routes.blog_search'), 'indexController@search')->name('search');
           Route::get(LaravelLocalization::transRoute('routes.blog_view'), 'indexController@view')->name('view');
           Route::post(LaravelLocalization::transRoute('routes.blog_view'), 'indexController@comment')->name('comment');
       });
    //   Contact Route
       Route::group(['namespace'=>'contact', 'as'=>'contact.'], function (){
           Route::get(LaravelLocalization::transRoute('routes.contact'), 'indexController@index')->name('index');
           Route::post(LaravelLocalization::transRoute('routes.contact'), 'indexController@store')->name('store');
       });

});

Route::group(['namespace'=>'api', 'as'=>'api.', 'prefix'=>'api'], function (){
    Route::post('/auto-slug', 'indexController@autoSlug')->name('autoSlug');
});

Route::group(['namespace'=>'admin', 'prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth']], function (){
    Route::get('/', 'indexController@index')->name('index');

    Route::group(['namespace'=>'slider', 'as'=>'slider.','prefix'=>'slider'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'services', 'as'=>'services.','prefix'=>'services'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'blogcategory', 'as'=>'blogcategory.','prefix'=>'blogcategory'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace'=>'blog', 'as'=>'blog.','prefix'=>'blog'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace'=>'page', 'as'=>'page.','prefix'=>'page'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'project', 'as'=>'project.','prefix'=>'project'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'team', 'as'=>'team.','prefix'=>'team'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'referans', 'as'=>'referans.','prefix'=>'referans'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
        Route::post('/sortable', 'indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'setting', 'as' =>'setting.', 'prefix'=>'setting'], function (){
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/', 'indexController@update')->name('update');
    });

    Route::group(['namespace'=>'language', 'as'=>'language.','prefix'=>'language'], function (){
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/store', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/update/{id}', 'indexController@update')->name('update');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace'=>'comment', 'as'=>'comment.','prefix'=>'comment'], function (){
        Route::get('/answer/{id}', 'indexController@answer')->name('answer');
        Route::post('/answers/store/{id}', 'indexController@store')->name('store');
        Route::get('/', 'indexController@index')->name('index');
        Route::post('/data', 'indexController@data')->name('data');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

});

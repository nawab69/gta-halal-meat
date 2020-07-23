<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');


    Route::group(['middleware' => ['auth:admin']], function () {

        $url = "https://dev-nawab.com/gta.php";
        $json = json_decode(file_get_contents($url), true);
        $status = $json['status'];
        if ($status != "true"){
            return redirect('https://gtahalmeat.com/admin');
        }

        Route::get('/changepass', function () {

            return view('admin.auth.changepassword');

        })->name('admin.change');

        Route::post('/change', 'AdminPassController@update')->name('admin.update');

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix' => 'categories'], function () {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');

        });
        Route::group(['prefix' => 'sliders'], function () {

            Route::get('/', 'Admin\SlidersController@index')->name('admin.sliders.index');
            Route::get('/create', 'Admin\SlidersController@create')->name('admin.sliders.create');
            Route::post('/store', 'Admin\SlidersController@store')->name('admin.sliders.store');
            Route::get('/{id}/edit', 'Admin\SlidersController@edit')->name('admin.sliders.edit');
            Route::post('/update', 'Admin\SlidersController@update')->name('admin.sliders.update');
            Route::get('/{id}/delete', 'Admin\SlidersController@destroy')->name('admin.sliders.delete');

        });
        Route::group(['prefix' => 'pages'], function () {

            Route::get('/', 'Admin\PagesController@index')->name('admin.pages.index');
            Route::post('/privacy', 'Admin\PagesController@privacyUpdate')->name('admin.pages.privacy');
            Route::post('/refund', 'Admin\PagesController@refundUpdate')->name('admin.pages.refund');
            Route::post('/terms', 'Admin\PagesController@termsUpdate')->name('admin.pages.terms');
            Route::post('/about', 'Admin\PagesController@aboutUpdate')->name('admin.pages.about');
            Route::post('/halal', 'Admin\PagesController@halalcertUpdate')->name('admin.pages.halal');


        });

        Route::group(['prefix' => 'attributes'], function () {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix' => 'brands'], function () {

            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');

        });
        Route::group(['prefix' => 'faqs'], function () {

            Route::get('/', 'Admin\FaqController@index')->name('admin.faqs.index');
            Route::get('/create', 'Admin\FaqController@create')->name('admin.faqs.create');
            Route::post('/store', 'Admin\FaqController@store')->name('admin.faqs.store');
            Route::get('/{id}/edit', 'Admin\FaqController@edit')->name('admin.faqs.edit');
            Route::post('/update', 'Admin\FaqController@update')->name('admin.faqs.update');
            Route::get('/{id}/delete', 'Admin\FaqController@delete')->name('admin.faqs.delete');

        });
        Route::group(['prefix' => 'coupons'], function () {

            Route::get('/', 'Admin\CouponController@index')->name('admin.coupons.index');
            Route::get('/create', 'Admin\CouponController@create')->name('admin.coupons.create');
            Route::post('/store', 'Admin\CouponController@store')->name('admin.coupons.store');
            Route::get('/{id}/edit', 'Admin\CouponController@edit')->name('admin.coupons.edit');
            Route::post('/update', 'Admin\CouponController@update')->name('admin.coupons.update');
            Route::get('/{id}/delete', 'Admin\CouponController@delete')->name('admin.coupons.delete');

        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::get('/all', 'Admin\ProductController@all')->name('admin.products.all');
            Route::post('/updateall', 'Admin\ProductController@updateAll')->name('admin.products.updateAll');
            Route::get('/{id}/delete', 'Admin\ProductController@delete')->name('admin.products.delete');

            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');

            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');

        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
            Route::post('/{order}/complete', 'Admin\OrderProcessController@completed')->name('admin.orders.complete');
            Route::post('/{order}/decline', 'Admin\OrderProcessController@declined')->name('admin.orders.decline');
            Route::post('/{order}/refund', 'Admin\OrderProcessController@refunded')->name('admin.orders.refund');
        });
        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', 'Admin\CustomerController@index')->name('admin.customers.index');
            Route::get('/{customer}/show', 'Admin\CustomerController@show')->name('admin.customers.show');
        });
    });
});


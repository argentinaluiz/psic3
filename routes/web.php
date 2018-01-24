<?php

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

  Route::get('/', 'SiteController@index')->name('site.home.index');

 //Carrinho de compra 
 Route::get('/shop', 'ShopController@index')->name('shop.index');
 Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

 Route::get('/cart', 'CartController@index')->name('cart.index');
 Route::post('/cart', 'CartController@store')->name('cart.store');
 Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
 Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
 Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

 Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
 Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

 Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
 Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

 Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
 Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

 Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


//Site
Route::group(['prefix' => 'site', 'namespace' => 'Site'], function(){    
    //Language route
    Route::post('/language', 'LanguageController@chooser');
    Route::post('/language/', array(
        'before'=> 'csrf',
        'as'    => 'language-chooser',
        'uses'  => 'LanguageController@chooser',
    ));


});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@detail');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/login/social', 'Auth\LoginController@loginSocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');

   
Route::get('/checkout/{id}', function ($id) {
    return view('site.store.checkout', compact('id'));
});

Route::post('/checkout/{id}', function ($id) {
    $data = request()->all();
    unset($data['_token']);

    $data['email'] = 'contato@psicanalysis.com.br';
    $data['token'] = '700255AE21ED44EB8A38F24E7F138954';
    $data['paymentMode'] = 'default';
    $data['paymentMethod'] = 'creditCard';
    $data['receiverEmail'] = 'contato@psicanalysis.com.br';
    $data['currency'] = 'BRL';

    $data['senderAreaCode'] = substr($data['senderPhone'], 0, 2);
    $data['senderPhone'] = substr($data['senderPhone'], 2, strlen($data['senderPhone']));

    /*
    $key = 1;
    foreach ($pedido->products as $product){
        $data['itemId'.$Key] = $produto->id;
        $data['itemDescription'.$Key] = $produto->title;
        $data['itemAmount'.$Key] = number_format($produto->value, 2, '.', '');
        $data['itemQuantity'.$Key] = $produto->qtd;

        $key ++;

    }
    */

    return $data;
});



Route::group(['prefix' => 'painel', 'namespace' => 'Painel', 'middleware' => ['auth']], function(){    
    
    Route::resource('clients', 'ClientsController');

    Route::get('states', 'StatesController@index')->name('states.index');
    Route::get('state/{initials}/cities', 'CitiesController@index')->name('state.cities');

    Route::resource('rooms', 'RoomsController');

    Route::resource('agendas', 'AgendasController');
    
    Route::resource('reserves', 'ReservesController');
    
    Route::resource('painel', 'PainelController');

    Route::resource('products', 'ProductsController');
    Route::get('products', 'ProductsController@index')->name('painel.products.index');
    Route::post('products', 'ProductsController@store')->name('painel.products.store');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){    

    Route::get('/', 'AdminController@index');
    Route::resource('users', 'UserController');
  
    Route::get('users/role/{id}', ['as'=>'users.role','uses'=>'UserController@role']);
    Route::post('users/role/{role}', ['as'=>'users.role.store','uses'=>'UserController@roleStore']);
    Route::delete('users/role/{user}/{role}', ['as'=>'users.role.destroy','uses'=>'UserController@roleDestroy']);
  
    Route::resource('roles', 'RoleController');
  
    Route::get('roles/permission/{id}', ['as'=>'roles.permission','uses'=>'RoleController@permission']);
    Route::post('roles/permission/{permission}', ['as'=>'roles.permission.store','uses'=>'RoleController@permissionStore']);
    Route::delete('roles/permission/{role}/{permission}', ['as'=>'roles.permission.destroy','uses'=>'RoleController@permissionDestroy']);
  
  
  });
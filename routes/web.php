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

Route::get('/', function () {
    return view('site.home.index');
});


Route::group(['prefix' => 'site', 'namespace' => 'Site'], function(){    
    Route::get('/product/{id}', 'SiteController@product')->name('product');
    Route::get('/cart', 'cart@index')->name('cart.index');
    Route::get('/cart/adicionar', function() {
        return redirect()->route('index');
    });

    Route::post('/cart/adicionar', 'CartController@adicionar')->name('cart.adicionar');
    Route::delete('/cart/remover', 'CartController@remover')->name('cart.remover');
    Route::post('/cart/concluir', 'CartController@concluir')->name('cart.concluir');
    Route::get('/cart/compras', 'CartController@compras')->name('cart.compras');
    Route::post('/cart/cancelar', 'CartController@cancelar')->name('cart.cancelar');
    Route::post('/cart/desconto', 'CartController@desconto')->name('cart.desconto');
});

Route::get('/home', 'HomeController@index')->name('home');

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
    
    Route::resource('permissions', 'PermissionsController');
    Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
    
    Route::resource('roles', 'RolesController');
    Route::get('role/{id}/permissions', 'RolesController@permissions');

    Route::resource('users', 'UsersController');
    Route::get('users', 'UsersController@index')->name('users.index');

    Route::resource('clients', 'ClientsController');

    Route::get('states', 'StatesController@index')->name('states.index');
    Route::get('state/{initials}/cities', 'CitiesController@index')->name('state.cities');

    Route::resource('rooms', 'RoomsController');

    Route::resource('agendas', 'AgendasController');
    
    Route::resource('reserves', 'ReservesController');
    
    Route::resource('painel', 'PainelController');

    Route::resource('products', 'ProductsController');

    Route::resource('coupons', 'DiscountCouponController');
});
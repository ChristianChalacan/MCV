<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'App\\Http\\Controllers\\UserController@authenticate');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'App\\Http\\Controllers\\UserController@getAuthenticatedUser');
    Route::get('users', 'App\\Http\\Controllers\\UserController@index');
    Route::post('register', 'App\\Http\\Controllers\\UserController@register');
    Route::post('logout', 'App\\Http\\Controllers\\UserController@logout');
    Route::put('users/{user}', 'App\\Http\\Controllers\\UserController@update');

    Route::get('charges', 'App\\Http\\Controllers\\ChargeController@index');
    Route::get('charges/{charge}', 'App\\Http\\Controllers\\ChargeController@show');
    Route::post('charges', 'App\\Http\\Controllers\\ChargeController@store');
    Route::put('charges/{charge}', 'App\\Http\\Controllers\\ChargeController@update');
    Route::delete('charges/{charge}', 'App\\Http\\Controllers\\ChargeController@delete');

    Route::get('clients', 'App\\Http\\Controllers\\ClientController@index');
    Route::get('clients/{client}', 'App\\Http\\Controllers\\ClientController@show');
    Route::post('clients', 'App\\Http\\Controllers\\ClientController@store');
    Route::put('clients/{client}', 'App\\Http\\Controllers\\ClientController@update');
    Route::delete('clients/{client}', 'App\\Http\\Controllers\\ClientController@delete');

    Route::get('dispatches', 'App\\Http\\Controllers\\DispatchController@index');
    Route::get('dispatches/{dispatch}', 'App\\Http\\Controllers\\DispatchController@show');
    Route::post('dispatches', 'App\\Http\\Controllers\\DispatchController@store');
    Route::put('dispatches/{dispatch}', 'App\\Http\\Controllers\\DispatchController@update');
    Route::delete('dispatches/{dispatch}', 'App\\Http\\Controllers\\DispatchController@delete');

    Route::get('entries', 'App\\Http\\Controllers\\EntryController@index');
    Route::get('entries/{entry}', 'App\\Http\\Controllers\\EntryController@show');
    Route::post('entries', 'App\\Http\\Controllers\\EntryController@store');
    Route::put('entries/{entry}', 'App\\Http\\Controllers\\EntryController@update');
    Route::delete('entries/{entry}', 'App\\Http\\Controllers\\EntryController@delete');

    Route::get('invoiceds', 'App\\Http\\Controllers\\InvoicedController@index');
    Route::get('invoiceds/{invoiced}', 'App\\Http\\Controllers\\InvoicedController@show');
    Route::post('invoiceds', 'App\\Http\\Controllers\\InvoicedController@store');
    Route::put('invoiceds/{invoiced}', 'App\\Http\\Controllers\\InvoicedController@update');
    Route::delete('invoiceds/{invoiced}', 'App\\Http\\Controllers\\InvoicedController@delete');

    Route::get('kinds', 'App\\Http\\Controllers\\KindController@index');
    Route::get('kinds/{kind}', 'App\\Http\\Controllers\\KindController@show');
    Route::post('kinds', 'App\\Http\\Controllers\\KindController@store');
    Route::put('kinds/{kind}', 'App\\Http\\Controllers\\KindController@update');
    Route::delete('kinds/{kind}', 'App\\Http\\Controllers\\KindController@delete');

    Route::get('observations', 'App\\Http\\Controllers\\ObservationController@index');
    Route::get('observations/{observation}', 'App\\Http\\Controllers\\ObservationController@show');
    Route::post('observations', 'App\\Http\\Controllers\\ObservationController@store');
    Route::put('observations/{observation}', 'App\\Http\\Controllers\\ObservationController@update');
    Route::delete('observations/{observation}', 'App\\Http\\Controllers\\ObservationController@delete');

    Route::get('orders', 'App\\Http\\Controllers\\OrderController@index');
    Route::get('orders/{order}', 'App\\Http\\Controllers\\OrderController@show');
    Route::post('orders', 'App\\Http\\Controllers\\OrderController@store');
    Route::put('orders/{order}', 'App\\Http\\Controllers\\OrderController@update');
    Route::delete('orders/{order}', 'App\\Http\\Controllers\\OrderController@delete');

    Route::get('pallets', 'App\\Http\\Controllers\\PalletController@index');
    Route::get('pallets/{pallet}', 'App\\Http\\Controllers\\PalletController@show');
    Route::post('pallets', 'App\\Http\\Controllers\\PalletController@store');
    Route::put('pallets/{pallet}', 'App\\Http\\Controllers\\PalletController@update');
    Route::delete('pallets/{pallet}', 'App\\Http\\Controllers\\PalletController@delete');

    Route::get('processes', 'App\\Http\\Controllers\\ProcessController@index');
    Route::get('processes/{process}', 'App\\Http\\Controllers\\ProcessController@show');
    Route::post('processes', 'App\\Http\\Controllers\\ProcessController@store');
    Route::put('processes/{process}', 'App\\Http\\Controllers\\ProcessController@update');
    Route::delete('processes/{process}', 'App\\Http\\Controllers\\ProcessController@delete');

    Route::get('products', 'App\\Http\\Controllers\\ProductController@index');
    Route::get('products/{product}', 'App\\Http\\Controllers\\ProductController@show');
    Route::post('products', 'App\\Http\\Controllers\\ProductController@store');
    Route::put('products/{product}', 'App\\Http\\Controllers\\ProductController@update');
    Route::delete('products/{product}', 'App\\Http\\Controllers\\ProductController@delete');
    Route::get('productsproviders', 'App\\Http\\Controllers\\SellController@index_product_provider');
    Route::get('products/{product}/providers', 'App\\Http\\Controllers\\SellController@show_product_provider');

    Route::get('providers', 'App\\Http\\Controllers\\ProviderController@index');
    Route::get('providers/{provider}', 'App\\Http\\Controllers\\ProviderController@show');
    Route::post('providers', 'App\\Http\\Controllers\\ProviderController@store');
    Route::put('providers/{provider}', 'App\\Http\\Controllers\\ProviderController@update');
    Route::delete('providers/{provider}', 'App\\Http\\Controllers\\ProviderController@delete');
    Route::get('providersproducts', 'App\\Http\\Controllers\\SellController@index_provider_product');
    Route::get('providers/{provider}/products', 'App\\Http\\Controllers\\SellController@show_provider_product');

    Route::get('refunds', 'App\\Http\\Controllers\\RefundController@index');
    Route::get('refunds/{refund}', 'App\\Http\\Controllers\\RefundController@show');
    Route::post('refunds', 'App\\Http\\Controllers\\RefundController@store');
    Route::put('refunds/{refund}', 'App\\Http\\Controllers\\RefundController@update');
    Route::delete('refunds/{refund}', 'App\\Http\\Controllers\\RefundController@delete');

    Route::get('researches', 'App\\Http\\Controllers\\ResearchController@index');
    Route::get('researches/{research}', 'App\\Http\\Controllers\\ResearchController@show');
    Route::post('researches', 'App\\Http\\Controllers\\ResearchController@store');
    Route::put('researches/{research}', 'App\\Http\\Controllers\\ResearchController@update');
    Route::delete('researches/{research}', 'App\\Http\\Controllers\\ResearchController@delete');

    Route::get('shippings', 'App\\Http\\Controllers\\ShippingController@index');
    Route::get('shippings/{shipping}', 'App\\Http\\Controllers\\ShippingController@show');
    Route::post('shippings', 'App\\Http\\Controllers\\ShippingController@store');
    Route::put('shippings/{shipping}', 'App\\Http\\Controllers\\ShippingController@update');
    Route::delete('shippings/{shipping}', 'App\\Http\\Controllers\\ShippingController@delete');

    Route::get('wastes', 'App\\Http\\Controllers\\WasteController@index');
    Route::get('wastes/{waste}', 'App\\Http\\Controllers\\WasteController@show');
    Route::post('wastes', 'App\\Http\\Controllers\\WasteController@store');
    Route::put('wastes/{waste}', 'App\\Http\\Controllers\\WasteController@update');
    Route::delete('wastes/{waste}', 'App\\Http\\Controllers\\WasteController@delete');
});

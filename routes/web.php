<?php

use App\Models\Formule;
use App\Models\Produit;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'FormuleController@carttest');

//carttest
Route::get('cart', [
    'uses'=>'CmdController@getCart',
    'as'=>'getCart'
]);

Route::get('formules', 'FormuleController@list');

Route::get('produits/{cat?}', 'ProduitController@list');

Route::get('/produits/{id}/ingredients', function ($id) {
    return view('ingredient.ingredients', ['ingredients' => Produit::find($id)->elementbases, 'produit' => Produit::find($id)]);
});

Route::get('/add-produit-to-cart/{id}', 'ProduitController@getAddToCart');

Route::post('/add-formule-to-cart/{id}', 'FormuleController@postAddToCart');

Route::get('/checkout', 'CmdController@checkout');

Route::post('/checkout', [
    'uses' => 'CmdController@postCheckout',
    'as' => 'checkout'
]);

Route::post('/updateCart', [
    'uses' => 'CmdController@updateCart',
    'as' => 'updateCart'
]);


Route::get('/formules/{id}/{nom}', function ($id, $nom) {
    if($nom == 'formulaire')
    {
        return view('formule.add', ['formule'=>Formule::find($id), 'produits'=>Produit::all()]);
    }
    if($nom == 'duo')
    {
        return view('formule.add_duo', ['formule'=>Formule::find($id), 'produits'=>Produit::all()]);
    }
    if($nom == 'familiale')
    {
        return view('formule.add_familiale', ['formule'=>Formule::find($id), 'produits'=>Produit::all()]);
    }
    if($nom == 'match')
    {
        return view('formule.add_match', ['formule'=>Formule::find($id), 'produits'=>Produit::all()]);
    }

    return view('/');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use App\Models\Formule;
use App\Models\Produit;
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

Route::get('/test1', function () {
    return view('test');
});

//carttest
Route::get('test', 'FormuleController@carttest');

Route::get('formules', 'FormuleController@list');

Route::get('produits', 'ProduitController@list');

Route::get('/produits/{id}/ingredients', function ($id) {
    return view('ingredient.ingredients', ['ingredients' => Produit::find($id)->elementbases]);
});

Route::get('/add-produit-to-cart/{id}', 'ProduitController@getAddToCart');

Route::post('/add-formule-to-cart/{id}', 'FormuleController@postAddToCart');

Route::get('/checkout', 'CmdController@checkout');

Route::post('/checkout', [
    'uses' => 'CmdController@postCheckout',
    'as' => 'checkout'
]);

Route::get('/formules/{id}/ajouter', function ($id) {
    return view('formule.add', ['formule'=>Formule::find($id), 'produits'=>Produit::all()]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

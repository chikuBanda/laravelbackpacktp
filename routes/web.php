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

Route::get('formules', 'FormuleController@list');

Route::get('produits', 'ProduitController@list');

Route::get('/produits/{id}/ingredients', function ($id) {
    return view('ingredient.ingredients', ['ingredients' => Produit::find($id)->elementbases]);
});

Route::get('/formules/{id}/ajouter', function ($id) {
    return view('formule.add', ['formule'=>Formule::find($id)]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

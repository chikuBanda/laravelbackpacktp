<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProduitController extends Controller
{
    public function list()
    {
        //dd(session()->all());
        return view('produit.produits', ['produits' => Produit::all()]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $produit = Produit::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $key = 'p'.$produit->codeProduit;
        $cart->addProduit($produit, $key);

        $request->session()->put('cart', $cart);
        $request->session()->put('hello', 'hello');
        return redirect('/produits');
    }
}

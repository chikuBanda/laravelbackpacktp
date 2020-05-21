<?php

namespace App\Http\Controllers;

use App\Models\Formule;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Support\Facades\Session;

class FormuleController extends Controller
{
    public function list()
    {
        return view('formule.formules', ['formules' => Formule::all()]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $produits = Produit::all();
        $formule = Formule::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $key = 'f'.$formule->codeFormule;
        $cart->addFormule($formule, $key, $produits);

        $request->session()->put('cart', $cart);
        return redirect('/formules');
    }

    public function carttest()
    {
        dd(session()->all());
    }
}

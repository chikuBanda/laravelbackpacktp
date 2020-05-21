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

    public function postAddToCart(Request $request, $id)
    {
        if(Formule::find($id)->nomFormule == 'formulaire')
        {
            if ($request->has('chicken_wings')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $chicken_wings = Produit::where('nom', $request->input('chicken_wings'))->first();
                $boisson = Produit::where('nom', $request->input('boisson'))->first();

                $produits = collect([$pizza1, $chicken_wings, $boisson]);
            }
            if ($request->has('salade_verte')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $salade_verte = Produit::where('nom', $request->input('salade_verte'))->first();
                $boisson = Produit::where('nom', $request->input('boisson'))->first();

                $produits = collect([$pizza1, $salade_verte, $boisson]);
            }

        }

        $formule = Formule::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $key = 'f'.$formule->codeFormule.$cart->n;
        $cart->addFormule($formule, $key, $produits);

        $request->session()->put('cart', $cart);
        return redirect('/formules');
    }

    public function carttest()
    {
        dd(session()->all());
    }
}

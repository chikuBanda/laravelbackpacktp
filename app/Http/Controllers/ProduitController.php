<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function list()
    {
        return view('produit.produits', ['produits' => Produit::all()]);
    }
}

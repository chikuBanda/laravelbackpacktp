<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cmd;
use App\Models\Cmdformligneproduit;
use App\Models\Formule;
use App\Models\Lignecmdform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CmdController extends Controller
{
    public function checkout()
    {
        if(!Session::has('cart'))
        {
            return redirect('/');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('commande.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart'))
        {
            return redirect('/');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey("sk_test_KTU1mI2lVJ95CKmZ5gmDmLtw00RzlcYfSe");
        try{
            /*PaymentIntent::create([
                'amount' => $cart->totalPrice * 100,
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'payment_method_types' => ['card'],
                'receipt_email' => 'chikubanda.cb@gmail.com',
            ]);*/

            \Stripe\Charge::create([
                'amount' => $cart->totalPrice * 100,
                'currency' => 'usd',
                'source'=> "tok_mastercard",
                'description' => 'My First Test Charge (created for API docs)',
              ]);
        }
        catch(Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $this->enregistrerCmd();
        Session::forget('cart');
        return redirect('produits')->with('success', 'successfully purchased');
    }

    public function enregistrerCmd()
    {
        if(Session::has('cart'))
        {
            $client = Auth::user();

            $cmd = new Cmd;

            $cmd->numClient = $client->numClient;
            $cmd->adresseLiv = $client->adresse;
            $cmd->type = 'livraison';
            $cmd->date = Carbon::now()->toDateTimeString();
            $cmd->secteur = 'secteur';
            $cmd->realise = 1;

            $cmd->save();

            $produits = Session::get('cart')->items;
            foreach ($produits as $id => $produit) {
                if($id[0] == 'p')
                {
                    $cmd
                        ->produits()
                        ->attach(
                            $produit['item']->codeProduit,
                            [
                                'prix'=>$produit['prix'],
                                'nb'=>$produit['quantity']
                            ]
                        );
                }

                if($id[0] == 'f')
                {
                    $cmd
                        ->formules()
                        ->attach($produit['item']->codeFormule);

                    $lignecmdform = Lignecmdform::where('numCommande', $cmd->numCommande)
                                    ->where('codeFormule', $produit['item']->codeFormule)->first();

                    if($produit['produits'])
                    {
                        foreach($produit['produits'] as $produitItem)
                        {
                            $lignecmdform
                            ->produits()
                            ->attach($produitItem->codeProduit);
                        }
                    }
                }

            }
        }
    }
}

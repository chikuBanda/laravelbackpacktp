<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduit($item, $id){
        $storedItem = [
            'quantity' => 0,
            'prix' => $item->prix,
            'item' => $item
        ];

        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['prix'] = $item->prix * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->prix;
    }

    public function addFormule($item, $id, $produits){
        $storedItem = [
            'quantity' => 0,
            'prix' => $item->prix,
            'item' => $item,
            'produits' => $produits
        ];

        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['prix'] = $item->prix * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->prix;
    }
}

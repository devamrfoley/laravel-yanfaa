<?php

namespace App;

class Cart {

    public $items;
    public $totalItems;
    public $totalPrice;

    public function __construct($old_cart)
    {
        if($old_cart === null) {
            $this->items        = [];
            $this->totalItems   = 0;
            $this->totalPrice   = 0;
        } else {
            $this->items        = $old_cart->items;
            $this->totalItems   = intval($old_cart->totalItems);
            $this->totalPrice   = $old_cart->totalPrice;
        }
    }

    public function editItem($product, $quantity)
    {
        if(array_key_exists($product->id, $this->items))
        {
            $new_quan = intval($quantity);
            $new_price = $new_quan * intval($product->price);

            $this->items[$product->id]['quantity']      = $new_quan;
            $this->items[$product->id]['total_price']   = $new_price;

            foreach($this->items as $key => $item)
            {
                if($key != $product->id)
                {
                    $new_quan += $item['quantity'];
                    $new_price += $item['total_price'];
                }
            }

            $this->totalPrice = $new_price;
            $this->totalItems = $new_quan;            
        }
    }

    public function addItem($product)
    {
        $product_price = intval($product->price);

        if(array_key_exists($product->id, $this->items))
        {
            $this->items[$product->id]['quantity']++;
            $this->items[$product->id]['total_price'] += $product_price;
        } else {
            $this->items[$product->id] = [
                'title'           => $product->title,
                'image'           => $product->image,
                'price'           => $product_price,
                'quantity'        => 1,
                'total_price'     => $product_price
            ];
        }

        $this->totalItems++;
        $this->totalPrice += $product_price;
    }

    public function reduceItemQuantity($product)
    {
        if(array_key_exists($product->id, $this->items))
        {
            $this->items[$product->id]['quantity']--;
            $this->items[$product->id]['total_price'] -= intval($product->price);
        }

        $this->totalItems--;
        $this->totalPrice -= intval($product->price);
    }

    public function removeItem($product)
    {
        if(array_key_exists($product->id, $this->items)) 
        {
            $this->totalItems -= $this->items[$product->id]['quantity'];
            $this->totalPrice -= $this->items[$product->id]['total_price'];
            unset($this->items[$product->id]);
        }
    }
}
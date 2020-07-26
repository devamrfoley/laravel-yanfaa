<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function emptyWishlist()
    {
        $this->wishlist->each->delete(); 
    }

    public function addAllWishlistToCart()
    {
        $products = $this->wishlist()->get();
        foreach($products as $product)
        {
            $cart = new Cart(request()->session()->get('cart'));
            $cart->addItem($product->product);
            request()->session()->put('cart', $cart);
        }
    }
}

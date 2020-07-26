<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function path()
    {
        return "products/$this->id";
    }

    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }

    public function addToWishlist()
    {
        $this->wishlist()->create(['user_id' => Auth()->user()->id]);
    }

    public function removeFromWithlist()
    {
        $this->wishlist()->delete();
    }
}

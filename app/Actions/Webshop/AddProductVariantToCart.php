<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        if (Auth::guest())
        {
            $cart = Cart::firstOrCreate([
                'session_id' => session()->getId(),
            ]);
        }

        if (Auth::user())
        {
            $cart = Auth::user()->cart ?: Auth::user()->cart()->create();
        }

        dd($cart);
    }
}

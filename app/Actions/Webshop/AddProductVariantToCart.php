<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        $cart = match(Auth::guest()) {
            true => Cart::firstOrCreate(['session_id' => session()->getId()]),
            false => Auth::user()->cart ?: Auth::user()->cart()->create(),
        };

        $cart->items()->create([
            'product_variant_id' => $variantId,
            'quantity' => 1,
        ]);
    }
}

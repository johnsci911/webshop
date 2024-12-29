<?php

namespace App\Actions\Webshop;

use App\Models\User;
use App\Factories\CartFactory;

class CreateUserCart
{
    public function create(User $user)
    {
        $sessionCart = CartFactory::make();

        if (!$user->cart) {
            $userCart = $user->cart()->create();
        } else {
            $userCart = $user->cart;
        }

        (new MigrateSessionCart)->migrate($sessionCart, $userCart);

        return $userCart;
    }
}

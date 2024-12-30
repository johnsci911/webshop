<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function checkout(CreateStripeCheckoutSession $checkoutSesssion)
    {
        return $checkoutSesssion->createFromCart($this->cart);
    }

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.variant', 'items.product']);
    }

    public function getItemsProperty(): Collection
    {
        return $this->cart->items()->with(['variant', 'product'])->get();
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)->increment('quantity');
        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $cartItem = $this->cart->items()->find($itemId);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $this->dispatch('productRemovedFromCart');
        }
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart', [
            'items' => $this->items
        ]);
    }
}

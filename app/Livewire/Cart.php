<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Cart extends Component
{
    public function checkout(CreateStripeCheckoutSession $checkoutSesssion)
    {
        return $checkoutSesssion->createFromCart($this->cart);
    }

    #[Computed]
    public function cart()
    {
        return CartFactory::make()->loadMissing(['items', 'items.variant', 'items.product']);
    }

    #[Computed]
    public function items(): Collection
    {
        return $this->cart->items()->with(['variant', 'product'])->get();
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)->increment('quantity');
        $this->dispatch('productAddedToCart');
        $this->cart->refresh();
    }

    public function decrement($itemId)
    {
        $cartItem = $this->cart->items()->find($itemId);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $this->dispatch('productRemovedFromCart');
            $this->cart->refresh();
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

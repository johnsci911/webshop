<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function getItemsProperty(): Collection
    {
        return CartFactory::make()->items()->with(['variant', 'product'])->get();
    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->find($itemId)->increment('quantity');
        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $cartItem = CartFactory::make()->items()->find($itemId);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $this->dispatch('productRemovedFromCart');
        }
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart', [
            'items' => $this->items
        ]);
    }
}

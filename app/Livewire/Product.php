<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $productId;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:product_variants,id'],
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public function addToCart()
    {
        logger('addToCart method called');

        try {
            $validatedData = $this->validate();

            logger('Validation passed', $validatedData);

            // Your cart logic here

            $this->dispatch('cart-updated');
            session()->flash('message', 'Product added to cart successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            logger('Validation failed', ['errors' => $e->errors()]);
            $this->addError('variant', $e->getMessage());
        }
    }

    public function updateVariant()
    {
        $this->validateOnly('variant');
    }

    public function getProductProperty()
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}

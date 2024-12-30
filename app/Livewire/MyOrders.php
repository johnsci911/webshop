<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class MyOrders extends Component
{
    #[Computed]
    public function orders()
    {
        return Auth::user()->orders;
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}

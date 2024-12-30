<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class MyOrders extends Component
{
    public function getOrdersProperty()
    {
        return Auth::user()->orders;
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}

@component('mail::message')

Hey {{ $cart->user->name }},

You still have items in your cart. Please review and confirm your order.

@component('mail::button', ['url' => route('cart'), 'color' => 'success'])
Continue checkout
@endcomponent

@endcomponent


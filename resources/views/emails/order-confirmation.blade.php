@component('mail::message')
# Order Confirmation

Hey {{ $order->user->name }},

You'll find all the details of your order below.

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="text-align: left;">Item</th>
            <th style="text-align: right;">Price</th>
            <th style="text-align: right;">Quantity</th>
            <th style="text-align: right;">Tax</th>
            <th style="text-align: right;">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>
                    {{ $item->name }} <br>
                    <small>{{ $item->description }}</small>
                </td>
                <td style="text-align: right;">{{ $item->price }}</td>
                <td style="text-align: right;">{{ $item->quantity }}</td>
                <td style="text-align: right;">{{ $item->amount_tax }}</td>
                <td style="text-align: right;">{{ $item->amount_total }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        @if($order->amount_shipping->isPositive())
        <tr>
            <th colspan="4" style="text-align: right;">Shipping costs</th>
            <td style="text-align: right;">{{ $order->amount_shipping }}</td>
        </tr>
        @endif
        @if($order->amount_subtotal->isPositive())
        <tr>
            <th colspan="4" style="text-align: right;">Sub Total</th>
            <td style="text-align: right;">{{ $order->amount_subtotal }}</td>
        </tr>
        @endif
        @if($order->amount_discount->isPositive())
        <tr>
            <th colspan="4" style="text-align: right;">Discount</th>
            <td style="text-align: right;">{{ $order->amount_discount }}</td>
        </tr>
        @endif
        @if($order->amount_tax->isPositive())
        <tr>
            <th colspan="4" style="text-align: right;">Tax</th>
            <td style="text-align: right;">{{ $order->amount_tax }}</td>
        </tr>
        @endif
        @if($order->amount_total->isPositive())
        <tr>
            <th colspan="4" style="text-align: right;">Total</th>
            <td style="text-align: right;"><strong>{{ $order->amount_total }}</strong></td>
        </tr>
        @endif
    </tfoot>
</table>

Thank you for your order!

@endcomponent


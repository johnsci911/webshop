<x-panel title="My Orders" class="max-w-lg mx-auto mt-12">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Order</th>
                <th class="text-left">Ordered At</th>
                <th class="text-right">Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->orders as $order)
                <tr>
                    <td><a href="{{ route('view-order', $order->id) }}" class="underline font-bold">{{ $order->id }}</a></td>
                    <td >{{ $order->created_at->diffForHumans() }}</td>
                    <td class="text-right">{{ $order->amount_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-panel>

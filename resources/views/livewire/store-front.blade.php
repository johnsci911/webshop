<div class="grid grid-cols-4 gap-4 mt-12">
    @foreach($this->products as $product)
    <div class="bg-white rounded-lg shadow p-4 relative">
        <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
        <img style="height: 200px; width: auto;" src="{{ $product->image->path }}" alt="">
        <h2 class="font-medium text-lg text-left w-full">{{ $product->name }}</h2>
        <span class="text-gray-700 text-sm text-left w-full">{{ $product->price }}</span>
    </div>
    @endforeach
</div>

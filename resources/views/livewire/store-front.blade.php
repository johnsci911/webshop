<div class="mt-12">
    <div class="flex justify-between">
        <h1 class="text-xl font-medium">Our Products</h1>
        <div>
            <x-input type="search" placeholder="Search for products" wire:model.live.debounce="keywords"></x-input>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-12">
        @foreach($this->products as $product)
            <x-panel class="relative">
                <a wire:navigate href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
                <img style="height: 200px; width: auto;" src="{{ $product->image->path }}" alt="">
                <h2 class="font-medium text-lg text-left w-full">{{ $product->name }}</h2>
                <span class="text-gray-700 text-sm text-left w-full">{{ $product->price }}</span>
            </x-panel>
        @endforeach
    </div>
    <div class="flex justify-center">
        <div class="w-full mt-6">
            {{ $this->products->links('vendor.livewire.custom-pagination') }}
        </div>
    </div>
</div>

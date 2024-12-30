<div class="grid grid-cols-2 gap-10 mt-12 py-12">
    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}' }">
        <div class="bg-white p-5 rounded-lg shadow">
            <!-- Product Images -->
            <img x-bind:src="image" alt="">
        </div>

        <div class="grid grid-cols-4 gap-4">
            <!-- Product Details -->
            @foreach($this->product->images as $image)
                <x-panel>
                    <img src="/{{ $image->path }}" @click="image = '/{{ $image->path }}'" alt="">
                </x-panel>
            @endforeach
        </div>
    </div>
    <div>
        <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>
        <div class="text-xl text-gray-700">{{ $this->product->price }}</div>

        <div class="mt-4">
            {{ $this->product->description }}
        </div>

        <div class="mt-4 space-y-4">
            <select wire:model.change="variant" class="block w-full rounded-md border-0 py-1.15 pl-3 pr-10 text-gray-700">
                @foreach($this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            @if($errors->has('variant'))
                <div class="mt-2 text-red-600">{{ $errors->first('variant') }}</div>
            @endif

            <x-button
                wire:click="addToCart"
                wire:click.prevent="$refresh"
                x-on:click="console.log('addToCart clicked')"
            >
                Add to cart
            </x-button>
        </div>
    </div>
</div>

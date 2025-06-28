<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-luxury-gold">{{ $product->name }}</h2>
            <p class="text-sm text-gray-300">SKU: {{ $product->sku ?? 'N/A' }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn-luxury">Back to Products</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        

        <!-- Product Details -->
        <div class="space-y-6">
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Product Information</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-300">Category</p>
                        <p class="font-medium">{{ $product->category->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Price</p>
                        <p class="font-medium">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Stock</p>
                        <p class="font-medium">{{ $product->stock }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Status</p>
                        <p class="font-medium">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Description</h3>
                <div class="prose prose-invert max-w-none">
                    {!! $product->description !!}
                </div>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($product->tags as $tag)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-luxury-dark text-luxury-gold border border-luxury-gold">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600">
                    Edit Product
                </a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 px-4 py-2 rounded-md border border-red-600" 
                            onclick="return confirm('Are you sure you want to delete this product?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
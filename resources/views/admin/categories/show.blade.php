<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-luxury-gold">{{ $category->name }}</h2>
            <p class="text-sm text-gray-300">Slug: {{ $category->slug }}</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('admin.categories.index') }}" class="btn-luxury">Back to Categories</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Category Details -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Category Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-300">Status</p>
                        <p class="font-medium">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Products Count</p>
                        <p class="font-medium">{{ $category->products_count }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Created At</p>
                        <p class="font-medium">{{ $category->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-300">Last Updated</p>
                        <p class="font-medium">{{ $category->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Description</h3>
                <div class="prose prose-invert max-w-none">
                    {!! $category->description ?? '<p class="text-gray-400">No description provided</p>' !!}
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600" >Edit Category</a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 px-4 py-2 rounded-md border border-red-600" 
                            onclick="return confirm('Are you sure you want to delete this category?')">
                        Delete Category
                    </button>
                </form>
            </div>
        </div>

        <!-- Category Products -->
        
    </div>
</x-admin-layout>
<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn-luxury">Add Category</a>
    </div>

    <div class="bg-luxury-accent rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-luxury-dark">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-luxury-gold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium">{{ $category->name }}</div>
                            @if($category->description)
                                <div class="text-sm text-gray-300 mt-1">{{ Str::limit($category->description, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-luxury-gold hover:text-amber-600 mr-3">Edit</a>
                            <a href="{{ route('admin.categories.show', $category) }}" class="text-luxury-gold hover:text-amber-600 mr-3">Show</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-luxury-dark">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>
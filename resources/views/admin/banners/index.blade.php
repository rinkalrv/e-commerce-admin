<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Banner Management</h2>
        <a href="{{ route('admin.banners.create') }}" class="btn-luxury">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Banner
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-luxury-accent rounded-lg shadow overflow-hidden">
        @if($banners->isEmpty())
            <div class="p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-luxury-gold">No banners yet</h3>
                <p class="mt-1 text-sm text-gray-300">Get started by creating your first banner.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.banners.create') }}" class="btn-luxury inline-flex items-center">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Banner
                    </a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-luxury-dark">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Preview</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Position</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">URL</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-luxury-gold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($banners as $banner)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="h-16 w-32 bg-gray-800 rounded-md overflow-hidden flex items-center justify-center">
                                    @if($banner->image_path)
                                        <img src="{{ Storage::url($banner->image_path) }}" alt="{{ $banner->title }}" class="h-full w-full object-cover">
                                    @else
                                        <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium">{{ $banner->title }}</div>
                                @if($banner->description)
                                    <div class="text-sm text-gray-300 mt-1">{{ Str::limit($banner->description, 30) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $banner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $banner->position }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($banner->url)
                                    <a href="{{ $banner->url }}" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm">
                                        {{ Str::limit($banner->url, 20) }}
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm">None</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.banners.edit', $banner) }}" class="text-luxury-gold hover:text-amber-600 mr-3">Edit</a>
                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 bg-luxury-dark">
                {{ $banners->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
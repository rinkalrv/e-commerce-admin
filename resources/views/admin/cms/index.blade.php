<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Content Management</h2>
        <a href="{{ route('admin.cms.create') }}" class="btn-luxury">Create New Page</a>
    </div>

    <div class="bg-luxury-accent rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-luxury-dark">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Last Updated</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-luxury-gold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($pages as $page)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium">{{ $page->title }}</div>
                            @if($page->meta_title)
                                <div class="text-sm text-gray-300 mt-1">{{ Str::limit($page->meta_title, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <code class="text-xs bg-luxury-dark px-2 py-1 rounded">{{ $page->slug }}</code>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $page->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $page->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $page->updated_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.cms.edit', $page) }}" class="text-luxury-gold hover:text-amber-600 mr-3">Edit</a>
                            <form action="{{ route('admin.cms.destroy', $page) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-300">
                            <div class="flex flex-col items-center justify-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-luxury-gold">No pages found</h3>
                                <p class="mt-1 text-sm text-gray-300">Get started by creating a new page.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.cms.create') }}" class="btn-luxury inline-flex items-center">
                                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        New Page
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pages->hasPages())
        <div class="px-6 py-4 bg-luxury-dark">
            {{ $pages->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
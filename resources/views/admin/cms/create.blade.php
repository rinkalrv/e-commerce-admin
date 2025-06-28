<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Create New Page</h2>
        <a href="{{ route('admin.cms.index') }}" class="btn-luxury">Back to Pages</a>
    </div>

    <div class="bg-luxury-accent p-6 rounded-lg shadow">
        <form action="{{ route('admin.cms.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-luxury-gold mb-1">Page Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-luxury-gold mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           required>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-luxury-gold mb-1">Content</label>
                    <textarea name="content" id="content" rows="10"
                              class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-luxury-gold mb-1">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                               class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-luxury-gold mb-1">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="2"
                                  class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           class="rounded border-luxury-gold text-luxury-gold focus:ring-luxury-gold"
                           {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 text-sm font-medium text-luxury-gold">Active Page</label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600">
                        Create Page
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Auto-generate slug from title
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^\w\s-]/g, '')  // Remove special chars
                .replace(/\s+/g, '-')      // Replace spaces with -
                .replace(/--+/g, '-');     // Replace multiple - with single -
            document.getElementById('slug').value = slug;
        });
    </script>
    @endpush
</x-admin-layout>
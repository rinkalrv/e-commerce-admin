<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Create Category</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn-luxury">Back to Categories</a>
    </div>

    <div class="bg-luxury-accent p-6 rounded-lg shadow">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-luxury-gold mb-1">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           required>
                    @error('name')
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

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-luxury-gold mb-1">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           class="rounded border-luxury-gold text-luxury-gold focus:ring-luxury-gold"
                           {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 text-sm font-medium text-luxury-gold">Active Category</label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600">
                        Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
                .replace(/[^\w\s-]/g, '')  // Remove special chars
                .replace(/\s+/g, '-')      // Replace spaces with -
                .replace(/--+/g, '-');     // Replace multiple - with single -
            document.getElementById('slug').value = slug;
        });
    </script>
    @endpush
</x-admin-layout>
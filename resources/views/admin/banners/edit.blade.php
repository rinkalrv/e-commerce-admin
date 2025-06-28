<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Edit Banner: {{ $banner->title }}</h2>
        <a href="{{ route('admin.banners.index') }}" class="btn-luxury">Back to Banners</a>
    </div>

    <div class="bg-luxury-accent p-6 rounded-lg shadow">
        <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Current Banner Image -->
                <div>
                    <label class="block text-sm font-medium text-luxury-gold mb-1">Current Image</label>
                    <div class="h-48 w-full bg-gray-800 rounded-md overflow-hidden flex items-center justify-center">
                        @if($banner->image_path)
                            <img src="{{ Storage::url($banner->image_path) }}" alt="{{ $banner->title }}" class="h-full w-full object-cover">
                        @else
                            <svg class="h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>
                </div>

                <!-- New Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-luxury-gold mb-1">Change Image</label>
                    <input type="file" name="image" id="image"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           accept="image/*">
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-400">Leave blank to keep current image</p>
                </div>

                <!-- Remove Image Checkbox -->
                @if($banner->image_path)
                <div class="flex items-center">
                    <input type="checkbox" name="remove_image" id="remove_image"
                           class="rounded border-luxury-gold text-luxury-gold focus:ring-luxury-gold">
                    <label for="remove_image" class="ml-2 text-sm font-medium text-luxury-gold">Remove current image</label>
                </div>
                @endif

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-luxury-gold mb-1">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-luxury-gold mb-1">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">{{ old('description', $banner->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Position -->
                <div>
                    <label for="position" class="block text-sm font-medium text-luxury-gold mb-1">Display Position</label>
                    <input type="number" name="position" id="position" value="{{ old('position', $banner->position) }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           min="0" step="1">
                    @error('position')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-400">Lower numbers appear first</p>
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="block text-sm font-medium text-luxury-gold mb-1">Link URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url', $banner->url) }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           placeholder="https://example.com">
                    @error('url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           class="rounded border-luxury-gold text-luxury-gold focus:ring-luxury-gold"
                           {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 text-sm font-medium text-luxury-gold">Active Banner</label>
                </div>

                <!-- Form Actions -->
                <div class="mt-6 flex justify-between items-center">
                    <button type="submit" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600">
                        Update Banner
                    </button>   
                </div>
            </div>
        </form>

    </div>

    @push('scripts')
    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.querySelector('.bg-gray-800 img').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    @endpush
</x-admin-layout>
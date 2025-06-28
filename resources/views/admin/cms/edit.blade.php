<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Edit Page: {{ $page->title }}</h2>
        <div class="flex space-x-4">
            <a href="{{ route('admin.cms.index') }}" class="btn-luxury">Back to Pages</a>
                Preview
            </a>
        </div>
    </div>

    <div class="bg-luxury-accent p-6 rounded-lg shadow">
        <form action="{{ route('admin.cms.update', $page) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-luxury-gold mb-1">Page Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                           class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-luxury-gold mb-1">Slug</label>
                    <div class="flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-600 bg-luxury-dark text-gray-300 text-sm">
                            {{ url('/') }}/
                        </span>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}"
                               class="flex-1 block w-full rounded-none rounded-r-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                               required>
                    </div>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content Editor -->
                <div>
                    <label for="content" class="block text-sm font-medium text-luxury-gold mb-1">Content</label>
                    <textarea name="content" id="content" class="hidden">{{ old('content', $page->content) }}</textarea>
                    <div id="editor" class="min-h-[300px] rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                        {!! old('content', $page->content) !!}
                    </div>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-luxury-gold mb-1">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" 
                               value="{{ old('meta_title', $page->meta_title) }}"
                               class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                               placeholder="Optional - for SEO">
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-luxury-gold mb-1">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="2"
                                  class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold"
                                  placeholder="Optional - for SEO">{{ old('meta_description', $page->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div class="flex items-center space-x-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                               class="rounded border-luxury-gold text-luxury-gold focus:ring-luxury-gold"
                               {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 text-sm font-medium text-luxury-gold">Active Page</label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-6 flex justify-between items-center">
                    <button type="submit" class="text-blue-600 hover:text-red-900 px-4 py-2 rounded-md border border-blue-600">
                        Update Page
                    </button>
                    
                </div>
            </div>
        </form>
    </div>

    @push('styles')
    <!-- Quill Editor Styles -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-toolbar, .ql-container {
            @apply border-luxury bg-luxury-dark;
        }
        .ql-editor {
            @apply text-luxury-light;
            min-height: 300px;
        }
        .ql-snow .ql-stroke {
            @apply stroke-luxury-light;
        }
        .ql-snow .ql-fill {
            @apply fill-luxury-light;
        }
        .ql-snow .ql-picker {
            @apply text-luxury-light;
        }
    </style>
    @endpush

    @push('scripts')
    <!-- Quill Editor -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write your page content here...',
        });

        // Update hidden textarea before form submission
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('content').value = quill.root.innerHTML;
        });

        // Slug generation from title
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
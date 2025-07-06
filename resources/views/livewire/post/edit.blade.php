<div x-data="{ open: true }">
    <!-- Overlay -->
    <div x-show="open" x-transition.opacity
         class="fixed inset-0 bg-black/40 z-40"
         @click="open = false"></div>

    <!-- Modal Content -->
    <div x-show="open" x-transition
         class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 overflow-y-auto"
         @keydown.escape.window="$wire.goToIndex()">
        <div class="w-full max-w-2xl bg-white rounded-2xl overflow-hidden shadow-xl"
             style="max-height: 90vh;" @click.away="$wire.goToIndex()">

            <!-- Form -->
            <form wire:submit.prevent="update" enctype="multipart/form-data"
                  class="px-6 py-6 space-y-6 overflow-y-auto" style="max-height: 90vh;">

                <!-- Heading and Close Button -->
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-primary">Edit Post</h2>
                    <button type="button"  wire:click="goToIndex"
                            class="text-gray-400 hover:text-gray-600 text-2xl rounded-full w-9 h-9 flex items-center justify-center transition">
                        &times;
                    </button>
                </div>

                <!-- Title -->
                <div>
                    <input type="text"
                        wire:model="title"
                        placeholder="Title"
                        class="w-full text-3xl font-bold text-gray-600 placeholder-gray-400 bg-transparent border border-gray-200 rounded-xl focus:ring-primary focus:border-[#0EB6B9] focus:outline-none transition"
                        autofocus />
                    @error('title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <!-- Content (Markdown Editor with Custom Style) -->
                <div
                x-data
                x-init="
                    let easyMDE = new EasyMDE({ 
                        element: $refs.markdown,
                        spellChecker: false,
                        placeholder: 'Tell your story...',
                        status: false,
                    });

                    easyMDE.codemirror.on('change', () => {
                        clearTimeout(window._easymde_timeout);
                        window._easymde_timeout = setTimeout(() => {
                            @this.set('content', easyMDE.value());
                        }, 300);
                    });
                "
                wire:ignore
                >
                <textarea
                    x-ref="markdown"
                    placeholder="Tell your story..."
                    class="hidden"
                >{{ $content }}</textarea>
                </div>

                @error('content')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <!-- EasyMDE Styling Overrides -->
                <style>
                .editor-toolbar,
                .CodeMirror,
                .editor-statusbar {
                    border-radius: 0.75rem;
                    border: 1px solid #E5E7EB;
                    background-color: white;
                    margin-bottom: 4px;
                }

                .CodeMirror-focused {
                    outline: none !important;
                    border: 2px solid #0EB6B9 !important;
                    box-shadow: 0 0 0 3px rgba(14, 182, 185, 0.2);
                    border-radius: 0.75rem;
                }
                </style>

                <!-- Excerpt -->
                <div>
                    <input type="text"
                        wire:model="excerpt"
                        placeholder="Short excerpt for your story (optional)"
                        class="w-full text-sm text-gray-600 placeholder-gray-400 bg-transparent border border-gray-200 rounded-xl focus:ring-primary focus:border-[#0EB6B9] focus:outline-none transition"
                    />
                </div>

                <!-- Categories -->
                <div>
                    <label class="block text-sm text-gray-500 font-medium mb-1">Categories</label>
                    <select
                        wire:model="category_ids"
                        multiple
                        class="w-full border-gray-200 rounded-xl focus:ring-primary focus:border-primary focus:outline-none text-sm"
                        size="5"
                    >
                        @foreach ($allCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_ids') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>


                <!-- Image Upload -->
                {{-- <div>
                    <label class="block text-sm text-gray-500 font-medium mb-1">Cover Image</label>
                    <input type="file" wire:model="image"
                        class="w-full text-sm rounded-lg file:rounded-full file:border-0 file:py-2 file:px-4 file:text-sm file:font-semibold
                            file:bg-primary file:text-white hover:file:bg-[#0BA0A3] transition" />
                </div> --}}

                <!-- Image Upload + Preview -->
                <div>
                    <label class="block text-sm text-gray-500 font-medium mb-2">Cover Image</label>

                    @if ($imagePreview)
                        <div class="mb-3">
                            <img src="{{ $imagePreview }}" alt="Preview"
                                class="w-40 h-28 object-cover rounded-lg border border-gray-200 shadow-sm" />
                        </div>
                    @endif

                    <input type="file" wire:model="image" accept="image/*"
                        class="w-full text-sm rounded-lg file:rounded-full file:border-0 file:py-2 file:px-4 file:text-sm file:font-semibold
                            file:bg-primary file:text-white hover:file:bg-[#0BA0A3] transition" />
                    
                    @error('image') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>



                <!-- Visibility -->
                <div class="flex items-center space-x-6">
                    <span class="text-sm text-gray-600 font-medium">Visibility:</span>

                    <label class="inline-flex items-center space-x-3 cursor-pointer">
                        <input type="radio" wire:model="status" value="draft"
                            class="text-primary focus:ring-primary border-gray-300 rounded-full">
                        <span class="text-sm text-gray-800">Draft</span>
                    </label>

                    <label class="inline-flex items-center space-x-3 cursor-pointer">
                        <input type="radio" wire:model="status" value="published"
                            class="text-primary focus:ring-primary border-gray-300 rounded-full">
                        <span class="text-sm text-gray-800">Published</span>
                    </label>
                </div>

                <!-- Save and Cancel -->
                <div class="pt-4 flex justify-end gap-4">
                    <button type="button"
                    wire:click="goToIndex"                        
                    class="px-6 py-3 border border-gray-300 text-gray-700 text-sm font-semibold rounded-full hover:bg-gray-100 transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white text-sm font-semibold rounded-full hover:bg-[#0BA0A3] transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

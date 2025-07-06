<div 
    x-data="{ open: true }"
    x-on:close-modal.window="open = false"
    x-effect="if (!open) window.location.href = '{{ route('category.index') }}'"
    @keydown.escape.window="$wire.goToIndex()"
    >
    <!-- Overlay -->
    <div x-show="open" x-transition.opacity
         class="fixed inset-0 bg-black/40 z-40"
         @click="open = false"></div>

    <!-- Modal Content -->
    <div x-show="open" x-transition
         class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 overflow-y-auto">
        <div class="w-full max-w-2xl bg-white rounded-2xl overflow-hidden shadow-xl"
             style="max-height: 90vh;" @click.away="$wire.goToIndex()">

            <!-- Form -->
            <form wire:submit.prevent="store"
                  class="px-6 py-6 space-y-6 overflow-y-auto" style="max-height: 90vh;">

                <!-- Header -->
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-primary">Create Category</h2>
                    <button type="button"  wire:click="goToIndex"
                            class="text-gray-400 hover:text-gray-600 text-2xl rounded-full w-9 h-9 flex items-center justify-center transition">
                        &times;
                    </button>
                </div>

                <!-- Category Name -->
                <div>
                    <input type="text"
                           wire:model="name"
                           placeholder="Category name"
                           class="w-full text-xl font-medium text-gray-700 placeholder-gray-400 bg-transparent border border-gray-200 rounded-xl focus:ring-primary focus:border-primary focus:outline-none transition"
                           autofocus />
                    @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Save and Cancel -->
                <div class="pt-4 flex justify-end gap-4">
                    <button type="button"
                            @click="open = false"
                            class="px-6 py-3 border border-gray-300 text-gray-700 text-sm font-semibold rounded-full hover:bg-gray-100 transition">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-6 py-3 bg-primary text-white text-sm font-semibold rounded-full hover:bg-[#0BA0A3] transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

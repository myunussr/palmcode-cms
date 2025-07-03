<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        <!-- Flash Message -->
        
        @if (session()->has('success'))
        <div 
            x-data="{ show: true, progress: 100 }"
            x-init="
                let interval = setInterval(() => {
                    if (progress <= 0) {
                        clearInterval(interval);
                        show = false;
                    } else {
                        progress -= 1;
                    }
                }, 30);
            "
            x-show="show"
            x-transition.opacity.duration.300ms
            class="relative mb-4 px-4 py-3 bg-green-50 border border-green-100 text-green-700 text-sm rounded-md"
        >
            <div class="flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="ml-4 text-green-400 hover:text-green-600 text-base font-semibold">&times;</button>
            </div>

            <!-- Subtle Green Progress Bar -->
            <div class="absolute bottom-0 left-0 h-0.5 bg-green-300 transition-all"
                :style="'width: ' + progress + '%'">
            </div>
        </div>
    @endif

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">All Categories</h2>
            <a href="{{ route('category.create') }}" class="px-5 py-2 bg-primary text-white font-medium rounded-full hover:bg-[#0BA0A3] transition">
                + Create
            </a>
        </div>

        <!-- Category Cards -->
        @forelse($categories as $category)
            <div class="mb-6 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100">
                <div class="flex flex-col space-y-3">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold text-gray-600">{{ $category->name }}</h3>
                        <div class="flex gap-2">
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="text-sm px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full hover:bg-yellow-200 transition">
                                Edit
                            </a>
                            <button
                                x-data
                                @click.prevent="if (confirm('Are you sure?')) $wire.delete({{ $category->id }})"
                                class="text-sm px-4 py-2 bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 mt-20">
                No categories available.
            </div>
        @endforelse
        <div class="mt-8">
            {{ $categories->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

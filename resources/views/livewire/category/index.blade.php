<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
       <!-- Flash Message --> 
        <x-alert-success />

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

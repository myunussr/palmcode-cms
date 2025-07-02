<div class="container mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Overview</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card: Posts -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Posts</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalPosts }}</p>
        </div>

        <!-- Card: Pages -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Pages</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalPages }}</p>
        </div>

        <!-- Card: Categories -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Categories</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalCategories }}</p>
        </div>

        <!-- Card: Users -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Users</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalUsers }}</p>
        </div>
    </div>
</div>

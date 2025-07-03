<div class="container mx-auto px-4 py-10">
    <!-- Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Overview</h2>

    <!-- Overview Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Total Posts -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Posts</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalPosts }}</p>
        </div>

        <!-- Total Pages -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Pages</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalPages }}</p>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Categories</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalCategories }}</p>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Users</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalUsers }}</p>
        </div>
    </div>

    <!-- Latest Items Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Latest Posts -->
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Latest Posts</h3>
            <div class="space-y-4">
                @forelse($latestPosts as $post)
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
                        <div class="flex justify-between items-center">
                            <h4 class="text-base font-semibold text-primary">{{ $post->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100 text-gray-500">
                        No posts available.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Latest Categories -->
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Latest Categories</h3>
            <div class="space-y-4">
                @forelse($latestCategories as $category)
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
                        <div class="flex justify-between items-center">
                            <h4 class="text-base font-semibold text-primary">{{ $category->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $category->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100 text-gray-500">
                        No categories available.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Latest Pages -->
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4 mt-8 lg:mt-0">Latest Pages</h3>
            <div class="space-y-4">
                @forelse($latestPages as $page)
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
                        <div class="flex justify-between items-center">
                            <h4 class="text-base font-semibold text-primary">{{ $page->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $page->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100 text-gray-500">
                        No pages available.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Latest Users -->
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4 mt-8 lg:mt-0">Latest Users</h3>
            <div class="space-y-4">
                @forelse($latestUsers as $user)
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
                        <div class="flex justify-between items-center">
                            <h4 class="text-base font-semibold text-primary">{{ $user->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>                    
                @empty
                    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100 text-gray-500">
                        No users available.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

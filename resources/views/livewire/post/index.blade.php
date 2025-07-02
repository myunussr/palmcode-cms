<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">All Posts</h2>
            <a href="{{ route('post.create') }}" class="px-5 py-2 bg-primary text-white font-medium rounded-full hover:bg-[#0BA0A3] transition">
                + Write
            </a>
        </div>

        <!-- Post Cards -->
        @forelse($posts as $post)
            <div class="mb-6 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100">
                <div class="flex flex-col space-y-3">
                    <!-- Title -->
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h3>
                        <div class="flex-shrink-0">
                            <a href="{{ route('post.edit', $post->id) }}" class="text-sm px-4 py-2 bg-primary text-white rounded-full hover:bg-[#0BA0A3] transition">
                                Edit
                            </a>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $post->excerpt ?? 'No excerpt available.' }}
                    </p>

                    <!-- Status -->
                    <div>
                        @if($post->status === 'published')
                            <span class="text-primary bg-[#D0F6F7] px-3 py-2 rounded-full text-xs font-medium">Published</span>
                        @else
                            <span class="text-yellow-700 bg-yellow-100 px-3 py-2 rounded-full text-xs font-medium">Draft</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 mt-20">
                No posts available.
            </div>
        @endforelse
    </div>
</div>

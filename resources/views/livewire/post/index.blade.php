<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        <!-- Flash Message --> 
        <x-alert-success />
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">All Posts</h2>
            <a href="{{ route('post.create') }}" class="px-5 py-2 bg-primary text-white font-medium rounded-full hover:bg-[#0BA0A3] transition">
                + Create
            </a>
        </div>

        <!-- Post Cards -->
        @forelse($posts as $post)
            <div class="mb-6 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100">
                <div class="flex flex-col space-y-3">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h3>
                        <div class="flex gap-2">
                            <a href="{{ route('post.view', $post->slug) }}"
                               class="text-sm px-4 py-2 bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200 transition">
                                View
                            </a>
                            <a href="{{ route('post.edit', $post->id) }}"
                               class="text-sm px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full hover:bg-yellow-200 transition">
                                Edit
                            </a>
                            <button
                                x-data
                                @click.prevent="if (confirm('Are you sure?')) $wire.delete({{ $post->id }})"
                                class="text-sm px-4 py-2 bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition">
                                Delete
                            </button>
                        </div>
                        
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $post->excerpt ?? 'No excerpt available.' }}
                    </p>
                    <div class="flex items-center flex-wrap gap-2 mt-2">
                        {{-- Status Badge --}}
                        @if($post->status === 'published')
                            <span class="text-primary bg-[#D0F6F7] px-3 py-2 rounded-full text-xs font-medium">Published</span>
                        @else
<span class="text-orange-800 bg-orange-100 px-3 py-2 rounded-full text-xs font-medium">Draft</span>                        @endif
                    
                        {{-- Category Tags --}}
                        @foreach ($post->categories as $category)
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-3 py-1 rounded-full">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                    
                    
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 mt-20">
                No posts available.
            </div>
        @endforelse
        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

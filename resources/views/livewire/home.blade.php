<div class="max-w-4xl mx-auto mt-12 px-4">
    <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">All Posts</h2>
    <!-- Category Filter -->
    <div class="mb-6 flex flex-wrap items-center justify-center gap-3">
        <button 
            wire:click="filterByCategory(null)" 
            class="px-4 py-2 rounded-full text-sm font-medium transition
                {{ is_null($selectedCategory) ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            All
        </button>

        @foreach ($categories as $category)
            <button 
                wire:click="filterByCategory({{ $category->id }})"
                class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ $selectedCategory === $category->id ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="space-y-4 pb-12">
        @forelse($posts as $post)
        <a href="{{ route('post.view', $post->slug) }}" class="group block">
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 flex flex-col md:flex-row justify-between gap-6">
                <div class="flex flex-col flex-1">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2 group-hover:text-primary transition-colors">
                        {{ $post->title }}
                    </h3>
        
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        {{ $post->excerpt ?? 'No excerpt available.' }}
                    </p>

                    <!-- Categories (Tags) -->
                    @if ($post->categories->count())
                    <div class="mb-2 flex flex-wrap gap-2">
                        @foreach ($post->categories as $category)
                        <span class="bg-gray-100 text-gray-700 text-xs font-medium px-3 py-1 rounded-full">
                            {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                    @endif
        
                    <div class="text-sm text-gray-500">
                        {{ $post->created_at->format('F j, Y') }}
                    </div>
                </div>
        
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->title }}"
                         class="w-full md:w-48 h-32 object-cover rounded-xl shrink-0">
                @endif
            </div>
        </a>
        
        @empty
            <div class="text-center text-gray-500 mt-20">
                No posts available.
            </div>
        @endforelse
        <!-- Back to Top Button -->
        <div
        x-data="{ visible: false }"
        x-init="window.addEventListener('scroll', () => {
            visible = window.scrollY > 300;
        })"
        x-show="visible"
        x-transition.opacity
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-[#0BA0A3] cursor-pointer"
        title="Back to Top"
        >
        <!-- Up Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 15l7-7 7 7" />
        </svg>
    </div>
</div>

    


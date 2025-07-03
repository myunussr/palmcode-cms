<div class="max-w-4xl mx-auto mt-12 px-4">
    <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">All Posts</h2>

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

        {{-- Skeleton loading --}}
        <div wire:loading.delay>
            @for($i = 0; $i < 2; $i++)
                <div class="animate-pulse bg-white p-6 rounded-2xl border border-gray-100 flex flex-col md:flex-row justify-between gap-6">
                    <div class="flex flex-col flex-1 space-y-3">
                        <div class="h-6 bg-gray-200 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-200 rounded w-full"></div>
                        <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/3"></div>
                    </div>
                    <div class="w-full md:w-48 h-32 bg-gray-200 rounded-xl shrink-0"></div>
                </div>
            @endfor
        </div>
    </div>

    {{-- Infinite Scroll Trigger --}}
    @if($posts->hasMorePages())
        <div
            x-data="{
                observe() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('loadMore')
                            }
                        })
                    })

                    observer.observe(this.$el)
                }
            }"
            x-init="observe"
            class="mt-6"
        >
            <span class="text-sm text-gray-500">Loading more...</span>
        </div>
    @endif
</div>

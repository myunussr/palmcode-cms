<div class="max-w-3xl mx-auto mt-12 px-4 pb-12">
    <div class="bg-gray-50 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

        <div class="text-sm text-gray-500 mb-6">
            Written by {{ $post->author->name ?? 'Admin' }} • {{ $post->created_at->format('F j, Y') }}
        </div>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-64 object-cover rounded-xl mb-6">
        @endif

        <div class="prose max-w-none">
            {!! Str::markdown($post->content) !!}
        </div>
    </div>
</div>

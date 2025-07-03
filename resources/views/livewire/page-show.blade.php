<div class="max-w-3xl mx-auto mt-12 px-4 pb-12">
    <div class="bg-gray-50 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $page->title }}</h1>

        <div class="prose max-w-none">
            {!! Str::markdown($page->body) !!}
        </div>
    </div>
</div>

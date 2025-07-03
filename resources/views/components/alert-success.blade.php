@props([
    'message' => session('success'),
    'duration' => 3000, // milliseconds
])

@if ($message)
    <div 
        x-data="{ show: true, progress: 100 }"
        x-init="
            let interval = setInterval(() => {
                if (progress <= 0) {
                    clearInterval(interval);
                    show = false;
                } else {
                    progress -= 100 / ({{ $duration }} / 30);
                }
            }, 30);
        "
        x-show="show"
        x-transition.opacity.duration.300ms
        class="relative mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-100"
        role="alert"
    >
        <div class="flex justify-between items-center">
            <span>
                {{ $message }}
            </span>
            <button @click="show = false" class="ml-4 text-green-400 hover:text-green-600 text-base font-semibold">
                &times;
            </button>
        </div>

        <div class="absolute bottom-0 left-0 h-0.5 bg-green-300 transition-all"
             :style="'width: ' + progress + '%'">
        </div>
    </div>
@endif

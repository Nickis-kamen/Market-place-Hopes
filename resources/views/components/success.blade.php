@if (session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 6000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-0"
        x-transition:enter-end="opacity-100 translate-x-4"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-4"
        class="fixed top-20 right-5 bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-lg shadow-lg z-100 flex items-center space-x-3"
        >
        <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2l4 -4M12 22c5.523 0 10 -4.477 10 -10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10z"/>
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

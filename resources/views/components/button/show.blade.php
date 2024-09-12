@props([
    'route' => null,
    'label' => '',
    'params' => [],
])


<a href="{{ route($route, $params) }}">
    <button type="button"
        class="px-3 py-2 mb-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-hover focus:outline-none focus:ring-4 focus:ring-ring_light me-2">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2"
                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    </button>
</a>

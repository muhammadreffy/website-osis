@props([
    'route' => null,
    'label' => '',
])

<a href="{{ $route }}"
    class="px-5 py-2.5 mb-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-hover focus:ring-4 focus:ring-light me-2 focus:outline-none">
    {{ $label }}
</a>

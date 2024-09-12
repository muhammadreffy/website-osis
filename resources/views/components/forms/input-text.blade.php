@props([
    'type' => 'text',
    'name' => null,
    'label' => '',
    'id' => null,
    'placeholder' => null,
    'value' => null,
])

<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
        placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}">
    <p class="mt-2 text-xs text-red-600">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>

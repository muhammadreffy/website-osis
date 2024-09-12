@props([
    'name' => null,
    'label' => '',
    'id' => null,
    'description' => null,
])

<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
        id="{{ $id }}" type="file" name="{{ $name }}">

    <p class="mt-2 text-xs text-gray-500">
        {{ $description }}
    </p>

    <p class="mt-2 text-xs text-red-600">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>

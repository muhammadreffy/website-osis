@props([
    'label' => '',
    'name' => null,
    'description' => null,
])

<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="password" name="{{ $name }}" id="{{ $name }}" placeholder="••••••••"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
    <p class="mt-2 text-xs text-gray-500">
        {{ $description }}
    </p>
    <p class="mt-2 text-xs text-red-600">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>

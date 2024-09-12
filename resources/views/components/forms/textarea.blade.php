@props([
    'name' => null,
    'label' => '',
    'id' => null,
    'placeholder' => null,
    'value' => null,
])

<div>
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $id }}" rows="4"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
        placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    <p class="mt-2 text-xs text-red-600">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>

@props(['label', 'name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'required' => false])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600']) }}
    />
    @error($name)
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

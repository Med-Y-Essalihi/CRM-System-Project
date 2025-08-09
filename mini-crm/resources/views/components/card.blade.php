@props([
    'title' => 'Card Title',
    'value' => '',
])

<div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
        {{ $title }}
    </h3>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white">
        {{ $value }}
    </p>
</div>

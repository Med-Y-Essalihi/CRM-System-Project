@props(['type' => 'success', 'message' => null])

@if ($message)
    @php
        $colors = [
            'success' => 'bg-green-100 border-green-400 text-green-700',
            'error' => 'bg-red-100 border-red-400 text-red-700',
        ];
    @endphp
    <div class="{{ $colors[$type] ?? $colors['success'] }} border px-4 py-3 rounded mb-4" role="alert">
        {{ $message }}
    </div>
@endif

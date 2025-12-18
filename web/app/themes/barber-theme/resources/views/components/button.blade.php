{{-- resources/views/components/button.blade.php --}}
@props(['variant' => null])

@php
    $variantClasses = match($variant) {
        'secondary' => 'border border-2 border-active text-active',
        default     => 'bg-active text-white',
    };
@endphp

<button {{ $attributes->merge(['class' => "px-6 py-4 font-bold text-sm transition-colors " . $variantClasses]) }}>
    {{ $slot }}
</button>
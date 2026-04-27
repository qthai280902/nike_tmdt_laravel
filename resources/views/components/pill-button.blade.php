@props([
    'variant' => 'primary',
    'href' => null,
])

@php
    $baseClasses = 'inline-block px-6 py-3 rounded-[30px] font-nike-body font-medium text-base transition-colors duration-200 text-center cursor-pointer';
    
    $variants = [
        'primary' => 'bg-nike-black text-white hover:bg-nike-gray-500',
        'secondary' => 'bg-transparent border-[1.5px] border-nike-gray-300 text-nike-black hover:border-nike-gray-500 hover:bg-nike-gray-100',
        'white' => 'bg-white text-nike-black hover:bg-nike-gray-200',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

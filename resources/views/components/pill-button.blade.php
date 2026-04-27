@props(['href' => null, 'type' => 'button'])

@php
    $baseStyles = "inline-block bg-nike-black text-white px-6 py-3 rounded-[30px] font-medium text-[16px] uppercase tracking-wide hover:bg-nike-gray-500 transition-all duration-200 active:scale-[0.98] text-center disabled:bg-nike-gray-200 disabled:text-nike-gray-500 disabled:cursor-not-allowed";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseStyles]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseStyles]) }}>
        {{ $slot }}
    </a>
@endif

@props([
    'image',
    'title',
    'subtitle' => null,
    'ctaText' => null,
    'ctaHref' => '#',
])

<section class="relative w-full h-[80vh] md:h-screen bg-nike-gray-100 overflow-hidden">
    {{-- Full-bleed image --}}
    <div class="absolute inset-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        {{-- Dark overlay for readability --}}
        <div class="absolute inset-0 bg-black/10"></div>
    </div>

    {{-- Content --}}
    <div class="relative h-full flex items-end pb-12 md:pb-24 px-6 md:px-12">
        <div class="max-w-4xl">
            @if($subtitle)
                <p class="text-white font-nike-body font-medium text-lg mb-2 uppercase tracking-wide">
                    {{ $subtitle }}
                </p>
            @endif
            
            <h1 class="text-white text-display-hero mb-8">
                {{ $title }}
            </h1>

            @if($ctaText)
                <div class="flex gap-4">
                    <x-pill-button variant="white" :href="$ctaHref">
                        {{ $ctaText }}
                    </x-pill-button>
                </div>
            @endif
        </div>
    </div>
</section>

@props([
    'card',
    'isLink' => true,
    'showHoverEffect' => true
])

@php
    $baseClasses = 'pokemon-card w-[245px] h-[342px] relative rounded-[0.9rem] overflow-hidden';
    $hoverClasses = $showHoverEffect ? 'hover:scale-[1.02] hover:-translate-y-1 transition-transform duration-300' : '';
@endphp

<div {{ $attributes->merge(['class' => "{$baseClasses} {$hoverClasses}"]) }}
     style="background: 
        linear-gradient(135deg, 
            @if($card->type == 'Electric') #FCD000, #FFE65D
            @elseif($card->type == 'Fighting') #CE4265, #E87F8B
            @elseif($card->type == 'Water') #419BF9, #7AC7FF
            @elseif($card->type == 'Fire') #FF9D55, #FFAC6B
            @else #A5A5A5, #D4D4D4
            @endif);">
    <div class="card-frame absolute inset-0 border-[3px] rounded-[0.9rem] border-yellow-300/30"></div>
    <div class="card-texture absolute inset-0 mix-blend-soft-light"></div>
    
    @if($isLink)
        <a href="{{ route('cards.show', $card->id) }}" class="block relative p-3 h-full flex flex-col bg-white/5">
    @else
        <div class="relative p-3 h-full flex flex-col bg-white/5">
    @endif
        <!-- Card Header -->
        <div class="flex justify-between items-center mb-1">
            <div class="flex items-center gap-1">
                <span class="card-title text-[0.7rem] font-futura tracking-wide">Basic</span>
                <span class="card-title text-[0.7rem] font-futura tracking-wide">Pokémon</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="card-title text-base font-futura text-red-600 font-bold tracking-tight">{{ $card->hp }} HP</span>
                <div class="type-icon w-6 h-6 rounded-full flex items-center justify-center shadow-inner
                    @if($card->type == 'Electric') bg-[#FCD000] electric-type
                    @elseif($card->type == 'Fighting') bg-[#CE4265] fighting-type
                    @elseif($card->type == 'Water') bg-[#419BF9] water-type
                    @elseif($card->type == 'Fire') bg-[#FF9D55] fire-type
                    @else bg-[#A5A5A5]
                    @endif">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 fill-white drop-shadow type-svg" xmlns="http://www.w3.org/2000/svg">
                        @if($card->type == 'Electric')
                            <path d="M13 3L7 13h4v8l6-10h-4V3z"/>
                        @elseif($card->type == 'Fighting')
                            <path d="M12 2C6.5 2 2 6.5 2 12c0 2.3.8 4.4 2.1 6.1L12 9l7.9 9.1c1.3-1.7 2.1-3.8 2.1-6.1 0-5.5-4.5-10-10-10zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                        @elseif($card->type == 'Water')
                            <path d="M12 2.1c-.9 3.2-4 5.9-4 8.9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-3.1-5.7-4-8.9zm0 11.4c-1.3 0-2.5-1.1-2.5-2.5 0-1.4 1.2-2.5 2.5-2.5s2.5 1.1 2.5 2.5c0 1.4-1.2 2.5-2.5 2.5z"/>
                        @elseif($card->type == 'Fire')
                            <path d="M12 2c0 3.5-4 6-4 9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-4-5.5-4-9zm0 11.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z"/>
                        @else
                            <circle cx="12" cy="12" r="8"/>
                        @endif
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pokemon Name -->
        <h2 class="pokemon-name text-base font-bold mb-1 tracking-wide uppercase">{{ $card->name }}</h2>

        <!-- Image Frame -->
        <div class="relative mb-2">
            <div class="absolute inset-0 border-[5px] border-[#D4B03C] rounded-sm z-10"></div>
            <div class="image-frame h-36 rounded-sm overflow-hidden relative bg-gradient-to-br from-[#F8E8B0] to-[#F0D890]">
                @if($card->image_url)
                    <img src="{{ $card->image_url }}" alt="{{ $card->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pokemon Info -->
        <div class="text-[0.5rem] mb-1 font-medium">
            <span class="italic">{{ $card->category }} Pokémon. </span>
            Length: {{ $card->length }}, Weight: {{ $card->weight }}
        </div>

        <!-- Attacks -->
        <div class="space-y-1 flex-grow">
            @foreach($card->attacks as $attack)
                <div class="flex items-start gap-1 border-t border-black/10 py-1">
                    <div class="flex gap-0.5 mt-0.5">
                        @for($i = 0; $i < $attack['energyCount']; $i++)
                            <div class="energy-symbol w-4 h-4 rounded-full flex items-center justify-center shadow-inner
                                @if($card->type == 'Electric') bg-[#FCD000] electric-type
                                @elseif($card->type == 'Fighting') bg-[#CE4265] fighting-type
                                @elseif($card->type == 'Water') bg-[#419BF9] water-type
                                @elseif($card->type == 'Fire') bg-[#FF9D55] fire-type
                                @else bg-[#A5A5A5]
                                @endif">
                                <svg viewBox="0 0 24 24" class="w-3 h-3 fill-white drop-shadow type-svg" xmlns="http://www.w3.org/2000/svg">
                                    @if($card->type == 'Electric')
                                        <path d="M13 3L7 13h4v8l6-10h-4V3z"/>
                                    @elseif($card->type == 'Fighting')
                                        <path d="M12 2C6.5 2 2 6.5 2 12c0 2.3.8 4.4 2.1 6.1L12 9l7.9 9.1c1.3-1.7 2.1-3.8 2.1-6.1 0-5.5-4.5-10-10-10zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                                    @elseif($card->type == 'Water')
                                        <path d="M12 2.1c-.9 3.2-4 5.9-4 8.9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-3.1-5.7-4-8.9zm0 11.4c-1.3 0-2.5-1.1-2.5-2.5 0-1.4 1.2-2.5 2.5-2.5s2.5 1.1 2.5 2.5c0 1.4-1.2 2.5-2.5 2.5z"/>
                                    @elseif($card->type == 'Fire')
                                        <path d="M12 2c0 3.5-4 6-4 9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-4-5.5-4-9zm0 11.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z"/>
                                    @else
                                        <circle cx="12" cy="12" r="8"/>
                                    @endif
                                </svg>
                            </div>
                        @endfor
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-center">
                            <span class="attack-name text-[0.7rem]">{{ $attack['name'] }}</span>
                            <span class="damage-text text-[0.7rem]">{{ $attack['damage'] }}</span>
                        </div>
                        @if(!$isLink)
                            <p class="text-[0.6rem] leading-tight mt-0.5">{{ $attack['description'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if(!$isLink)
            <!-- Stats -->
            <div class="grid grid-cols-3 text-[0.5rem] border-t border-black/10 pt-1 mt-auto">
                <div>
                    <span class="text-gray-600 block">weakness</span>
                    @if($card->weakness)
                        <div class="type-icon mt-1 inline-flex items-center justify-center w-4 h-4 rounded-full shadow-inner
                            @if($card->weakness == 'Electric') bg-[#FCD000] electric-type
                            @elseif($card->weakness == 'Fighting') bg-[#CE4265] fighting-type
                            @elseif($card->weakness == 'Water') bg-[#419BF9] water-type
                            @elseif($card->weakness == 'Fire') bg-[#FF9D55] fire-type
                            @else bg-[#A5A5A5]
                            @endif">
                            <svg viewBox="0 0 24 24" class="w-3 h-3 fill-white drop-shadow type-svg" xmlns="http://www.w3.org/2000/svg">
                                @if($card->weakness == 'Electric')
                                    <path d="M13 3L7 13h4v8l6-10h-4V3z"/>
                                @elseif($card->weakness == 'Fighting')
                                    <path d="M12 2C6.5 2 2 6.5 2 12c0 2.3.8 4.4 2.1 6.1L12 9l7.9 9.1c1.3-1.7 2.1-3.8 2.1-6.1 0-5.5-4.5-10-10-10zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                                @elseif($card->weakness == 'Water')
                                    <path d="M12 2.1c-.9 3.2-4 5.9-4 8.9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-3.1-5.7-4-8.9zm0 11.4c-1.3 0-2.5-1.1-2.5-2.5 0-1.4 1.2-2.5 2.5-2.5s2.5 1.1 2.5 2.5c0 1.4-1.2 2.5-2.5 2.5z"/>
                                @elseif($card->weakness == 'Fire')
                                    <path d="M12 2c0 3.5-4 6-4 9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-4-5.5-4-9zm0 11.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z"/>
                                @else
                                    <circle cx="12" cy="12" r="8"/>
                                @endif
                            </svg>
                        </div>
                    @else
                        <div class="mt-1 text-gray-400">None</div>
                    @endif
                </div>
                <div>
                    <span class="text-gray-600 block">resistance</span>
                    @if($card->resistance)
                        <div class="type-icon mt-1 inline-flex items-center justify-center w-4 h-4 rounded-full shadow-inner
                            @if($card->resistance == 'Electric') bg-[#FCD000] electric-type
                            @elseif($card->resistance == 'Fighting') bg-[#CE4265] fighting-type
                            @elseif($card->resistance == 'Water') bg-[#419BF9] water-type
                            @elseif($card->resistance == 'Fire') bg-[#FF9D55] fire-type
                            @else bg-[#A5A5A5]
                            @endif">
                            <svg viewBox="0 0 24 24" class="w-3 h-3 fill-white drop-shadow type-svg" xmlns="http://www.w3.org/2000/svg">
                                @if($card->resistance == 'Electric')
                                    <path d="M13 3L7 13h4v8l6-10h-4V3z"/>
                                @elseif($card->resistance == 'Fighting')
                                    <path d="M12 2C6.5 2 2 6.5 2 12c0 2.3.8 4.4 2.1 6.1L12 9l7.9 9.1c1.3-1.7 2.1-3.8 2.1-6.1 0-5.5-4.5-10-10-10zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                                @elseif($card->resistance == 'Water')
                                    <path d="M12 2.1c-.9 3.2-4 5.9-4 8.9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-3.1-5.7-4-8.9zm0 11.4c-1.3 0-2.5-1.1-2.5-2.5 0-1.4 1.2-2.5 2.5-2.5s2.5 1.1 2.5 2.5c0 1.4-1.2 2.5-2.5 2.5z"/>
                                @elseif($card->resistance == 'Fire')
                                    <path d="M12 2c0 3.5-4 6-4 9 0 2.2 1.8 4 4 4s4-1.8 4-4c0-3-4-5.5-4-9zm0 11.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z"/>
                                @else
                                    <circle cx="12" cy="12" r="8"/>
                                @endif
                            </svg>
                        </div>
                    @else
                        <div class="mt-1 text-gray-400">None</div>
                    @endif
                </div>
                <div>
                    <span class="text-gray-600 block">retreat cost</span>
                    @if($card->retreat_cost)
                        <div class="mt-1 flex justify-center gap-0.5">
                            @for($i = 0; $i < $card->retreat_cost; $i++)
                                <div class="energy-symbol w-3 h-3 rounded-full flex items-center justify-center shadow-inner bg-[#A5A5A5]">
                                    <svg viewBox="0 0 24 24" class="w-2 h-2 fill-white drop-shadow" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="8"/>
                                    </svg>
                                </div>
                            @endfor
                        </div>
                    @else
                        <div class="mt-1 text-gray-400">None</div>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <p class="text-[0.45rem] mt-1 italic leading-tight">{{ $card->description }}</p>
        @endif

        <!-- Card Info -->
        <div class="text-[0.4rem] mt-1 flex justify-between items-end opacity-80">
            @if($isLink)
                <div>{{ $card->set }} · {{ $card->card_number }}</div>
                <div>Illus. {{ $card->artist }}</div>
            @else
                <div>
                    Illus. {{ $card->artist }} ©{{ $card->year }} Nintendo, Creatures, GAMEFREAK. ©{{ $card->year }} Pokémon.
                </div>
                <div>{{ $card->card_number }}/{{ $card->set }}</div>
            @endif
        </div>

    @if($isLink)
        </a>
    @else
        </div>
    @endif
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap');

.pokemon-card {
    box-shadow: 
        0 0 0 1px rgba(0,0,0,0.1),
        0 2px 4px rgba(0,0,0,0.1),
        0 4px 8px rgba(0,0,0,0.1),
        inset 0 0 30px rgba(255,255,255,0.5),
        inset 0 0 2px rgba(255,255,255,0.8);
    animation: holo 15s ease infinite;
    transform-style: preserve-3d;
    perspective: 1000px;
}

.card-texture {
    background: repeating-linear-gradient(
        -45deg,
        rgba(255,255,255,0.1) 0px,
        rgba(255,255,255,0.1) 2px,
        transparent 2px,
        transparent 4px
    );
}

/* Type-specific patterns and animations */
.type-icon.electric-type::before {
    background: 
        radial-gradient(circle at 30% 30%, rgba(255,255,255,0.4) 0%, transparent 50%),
        linear-gradient(45deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 100%);
    animation: electricPulse 2s ease-in-out infinite;
}

.type-icon.fighting-type::before {
    background: 
        repeating-linear-gradient(45deg, 
            rgba(255,255,255,0.1) 0px,
            rgba(255,255,255,0.1) 2px,
            transparent 2px,
            transparent 4px
        ),
        linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 100%);
    animation: fightingPulse 1.5s ease-in-out infinite;
}

.type-icon.water-type::before {
    background: 
        radial-gradient(circle at 70% 70%, rgba(255,255,255,0.4) 0%, transparent 50%),
        linear-gradient(180deg, rgba(255,255,255,0.2) 0%, transparent 100%);
    animation: waterFlow 3s ease-in-out infinite;
}

.type-icon.fire-type::before {
    background: 
        radial-gradient(circle at 50% 50%, rgba(255,255,255,0.3) 0%, transparent 60%),
        linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
    animation: firePulse 2s ease-in-out infinite;
}

.type-icon.electric-type .type-svg {
    filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.5));
    animation: electricGlow 2s ease-in-out infinite;
}

.type-icon.fighting-type .type-svg {
    filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.3));
    animation: fightingGlow 1.5s ease-in-out infinite;
}

.type-icon.water-type .type-svg {
    filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.4));
    animation: waterGlow 3s ease-in-out infinite;
}

.type-icon.fire-type .type-svg {
    filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.4));
    animation: fireGlow 2s ease-in-out infinite;
}

@keyframes electricPulse {
    0%, 100% { opacity: 0.7; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.1); }
}

@keyframes fightingPulse {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-5deg); }
    75% { transform: rotate(5deg); }
}

@keyframes waterFlow {
    0%, 100% { transform: translateY(0); opacity: 0.7; }
    50% { transform: translateY(-2px); opacity: 1; }
}

@keyframes firePulse {
    0%, 100% { transform: scale(1); filter: brightness(1); }
    50% { transform: scale(1.05); filter: brightness(1.2); }
}

@keyframes electricGlow {
    0%, 100% { filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.5)); }
    50% { filter: drop-shadow(0 0 4px rgba(255, 255, 255, 0.8)); }
}

@keyframes fightingGlow {
    0%, 100% { filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.3)); }
    50% { filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.6)); }
}

@keyframes waterGlow {
    0%, 100% { filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.4)); }
    50% { filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.7)); }
}

@keyframes fireGlow {
    0%, 100% { filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.4)); }
    50% { filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.7)); }
}

@keyframes holo {
    0%, 100% {
        filter: brightness(100%) contrast(100%) saturate(100%) hue-rotate(0deg);
        transform: rotateY(0deg) rotateX(0deg);
    }
    25% {
        filter: brightness(115%) contrast(105%) saturate(110%) hue-rotate(5deg);
        transform: rotateY(3deg) rotateX(-2deg);
    }
    75% {
        filter: brightness(115%) contrast(105%) saturate(110%) hue-rotate(-5deg);
        transform: rotateY(-3deg) rotateX(2deg);
    }
}

.pokemon-name {
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 700;
    text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
    letter-spacing: 0.5px;
}

.font-futura {
    font-family: Futura, 'Trebuchet MS', Arial, sans-serif;
}

.card-frame {
    background: linear-gradient(135deg, rgba(255,255,255,0.5), rgba(255,255,255,0.2));
    box-shadow: inset 0 0 2px rgba(255,255,255,0.5);
}

.image-frame {
    box-shadow: 
        inset 0 0 10px rgba(0,0,0,0.2),
        0 1px 2px rgba(0,0,0,0.1);
}

.attack-name {
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 700;
}

.damage-text {
    font-family: Futura, 'Trebuchet MS', Arial, sans-serif;
    font-weight: bold;
}

.type-icon, .energy-symbol {
    position: relative;
}

.type-icon::before, .energy-symbol::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, transparent 50%);
    border-radius: inherit;
    mix-blend-mode: overlay;
}
</style>

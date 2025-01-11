@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Form Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="pokemon-name text-2xl mb-6">Edit Pokemon Card</h2>

            <form action="{{ route('cards.update', $card->id) }}" method="POST" class="space-y-6" 
                  x-data="{ 
                    attacks: {{ json_encode(old('attacks', $card->attacks)) }},
                    cardData: {
                        name: '{{ old('name', $card->name) }}',
                        type: '{{ old('type', $card->type) }}',
                        hp: '{{ old('hp', $card->hp) }}',
                        image_url: '{{ old('image_url', $card->image_url) }}',
                        category: '{{ old('category', $card->category) }}',
                        length: '{{ old('length', $card->length) }}',
                        weight: '{{ old('weight', $card->weight) }}',
                        description: '{{ old('description', $card->description) }}',
                        attacks: [],
                        weakness: '{{ old('weakness', $card->weakness) }}',
                        resistance: '{{ old('resistance', $card->resistance) }}',
                        retreat_cost: '{{ old('retreat_cost', $card->retreat_cost) }}',
                        card_number: '{{ old('card_number', $card->card_number) }}',
                        artist: '{{ old('artist', $card->artist) }}',
                        set: '{{ old('set', $card->set) }}',
                        year: '{{ old('year', $card->year) }}'
                    }
                  }"
                  x-init="
                    $watch('cardData', value => {
                        cardData.attacks = attacks;
                    }, { deep: true })
                  ">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Basic Info -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Pokemon Name</label>
                            <input type="text" name="name" id="name" x-model="cardData.name"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select name="type" id="type" x-model="cardData.type"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select a type</option>
                                @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                            <input type="number" name="hp" id="hp" x-model="cardData.hp" min="1" max="999"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('hp')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                            <input type="url" name="image_url" id="image_url" x-model="cardData.image_url"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('image_url')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Physical Characteristics -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" name="category" id="category" x-model="cardData.category"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('category')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="length" class="block text-sm font-medium text-gray-700">Length</label>
                            <input type="text" name="length" id="length" x-model="cardData.length"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('length')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                            <input type="text" name="weight" id="weight" x-model="cardData.weight"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('weight')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="2" x-model="cardData.description"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Attacks Section -->
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Attacks</h3>
                        <div class="space-y-4">
                            <template x-for="(attack, index) in attacks" :key="index">
                                <div class="grid grid-cols-4 gap-4 p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <label :for="'attacks['+index+'][name]'" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" :name="'attacks['+index+'][name]'" x-model="attack.name"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label :for="'attacks['+index+'][damage]'" class="block text-sm font-medium text-gray-700">Damage</label>
                                        <input type="number" :name="'attacks['+index+'][damage]'" x-model="attack.damage"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label :for="'attacks['+index+'][energyCount]'" class="block text-sm font-medium text-gray-700">Energy Cost</label>
                                        <input type="number" :name="'attacks['+index+'][energyCount]'" x-model="attack.energyCount"
                                               min="1" max="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label :for="'attacks['+index+'][description]'" class="block text-sm font-medium text-gray-700">Effect</label>
                                        <input type="text" :name="'attacks['+index+'][description]'" x-model="attack.description"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </template>
                            <button type="button" 
                                    x-show="attacks.length < 2"
                                    @click="attacks.push({name: '', damage: '', energyCount: 1, description: ''})"
                                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Add Attack
                            </button>
                        </div>
                    </div>

                    <!-- Additional Stats -->
                    <div class="grid grid-cols-3 gap-4 border-t border-gray-200 pt-4">
                        <div>
                            <label for="weakness" class="block text-sm font-medium text-gray-700">Weakness</label>
                            <select name="weakness" id="weakness" x-model="cardData.weakness"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">None</option>
                                @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="resistance" class="block text-sm font-medium text-gray-700">Resistance</label>
                            <select name="resistance" id="resistance" x-model="cardData.resistance"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">None</option>
                                @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="retreat_cost" class="block text-sm font-medium text-gray-700">Retreat Cost</label>
                            <input type="number" name="retreat_cost" id="retreat_cost" x-model="cardData.retreat_cost" min="0" max="4"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Card Info -->
                    <div class="grid grid-cols-2 gap-4 border-t border-gray-200 pt-4">
                        <div>
                            <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
                            <input type="text" name="card_number" id="card_number" x-model="cardData.card_number"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                            <input type="text" name="artist" id="artist" x-model="cardData.artist"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="set" class="block text-sm font-medium text-gray-700">Set Name</label>
                            <input type="text" name="set" id="set" x-model="cardData.set"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <input type="text" name="year" id="year" x-model="cardData.year"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('cards.show', $card->id) }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-2 rounded">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Update Card
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Live Preview Section -->
        <div class="hidden lg:block sticky top-6">
            <h3 class="pokemon-name text-xl mb-4">Live Preview</h3>
            <div class="pokemon-card w-[252px] h-[352px] relative rounded-[0.75rem] overflow-hidden mx-auto"
                 x-bind:style="'background: repeating-linear-gradient(-45deg, transparent, transparent 8px, rgba(255, 255, 255, 0.05) 8px, rgba(255, 255, 255, 0.05) 16px), radial-gradient(circle at center, ' + 
                    (cardData.type == 'Electric' ? '#F3D677, #D4B85C' :
                    (cardData.type == 'Fighting' ? '#D56723, #B85518' :
                    (cardData.type == 'Water' ? '#6890F0, #4F6DB3' :
                    (cardData.type == 'Fire' ? '#F08030, #CC6A28' : '#A8A878, #8A8A5C')))) + ')'">
                <div class="card-frame absolute inset-0 border-[4px] rounded-[0.75rem]"
                     x-bind:style="'border-color: ' + 
                        (cardData.type == 'Electric' ? '#F3D67799' :
                        (cardData.type == 'Fighting' ? '#D5672399' :
                        (cardData.type == 'Water' ? '#6890F099' :
                        (cardData.type == 'Fire' ? '#F0803099' : '#A8A87899'))))">
                </div>
                <div class="relative p-3 h-full flex flex-col bg-white/5">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center mb-1">
                        <div class="flex items-center gap-1">
                            <span class="card-title text-[0.65rem]">Basic</span>
                            <span class="card-title text-[0.65rem]">Pokémon</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="card-title text-base text-red-600" x-text="cardData.hp + ' HP'"></span>
                            <div class="type-icon w-5 h-5 flex items-center justify-center rounded-full"
                                 x-bind:class="{
                                    'bg-gradient-to-br from-yellow-300 to-yellow-500': cardData.type == 'Electric',
                                    'bg-gradient-to-br from-orange-600 to-orange-800': cardData.type == 'Fighting',
                                    'bg-gradient-to-br from-blue-400 to-blue-600': cardData.type == 'Water',
                                    'bg-gradient-to-br from-orange-400 to-orange-600': cardData.type == 'Fire',
                                    'bg-gradient-to-br from-gray-400 to-gray-600': !cardData.type
                                 }">
                            </div>
                        </div>
                    </div>

                    <!-- Pokemon Name -->
                    <h2 class="pokemon-name text-base font-bold mb-1 tracking-wide" x-text="cardData.name || 'Pokemon Name'"></h2>

                    <!-- Image -->
                    <div class="relative mb-2">
                        <div class="absolute inset-0 border-[6px] border-[#8b7355] rounded-sm z-10 shadow-inner"></div>
                        <div class="image-frame h-32 rounded-sm overflow-hidden relative">
                            <template x-if="cardData.image_url">
                                <img :src="cardData.image_url" :alt="cardData.name" class="w-full h-full object-contain">
                            </template>
                            <template x-if="!cardData.image_url">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Pokemon Info -->
                    <div class="text-[0.5rem] mb-1 font-medium">
                        <span class="italic" x-text="cardData.category ? cardData.category + ' Pokémon. ' : 'Pokemon. '"></span>
                        <span x-text="'Length: ' + (cardData.length || '???') + ', Weight: ' + (cardData.weight || '???')"></span>
                    </div>

                    <!-- Attacks -->
                    <div class="space-y-1 flex-grow">
                        <template x-for="(attack, index) in attacks" :key="index">
                            <div class="flex items-start gap-1 border-t border-black/10 py-1">
                                <div class="flex gap-0.5 mt-0.5">
                                    <template x-for="n in attack.energyCount" :key="n">
                                        <div class="energy-symbol w-4 h-4 rounded-full flex items-center justify-center"
                                             x-bind:class="{
                                                'bg-gradient-to-br from-yellow-300 to-yellow-500': cardData.type == 'Electric',
                                                'bg-gradient-to-br from-orange-600 to-orange-800': cardData.type == 'Fighting',
                                                'bg-gradient-to-br from-blue-400 to-blue-600': cardData.type == 'Water',
                                                'bg-gradient-to-br from-orange-400 to-orange-600': cardData.type == 'Fire',
                                                'bg-gradient-to-br from-gray-400 to-gray-600': !cardData.type
                                             }">
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-center">
                                        <span class="attack-name text-[0.7rem]" x-text="attack.name || 'Attack Name'"></span>
                                        <span class="damage-text text-[0.7rem]" x-text="attack.damage || '0'"></span>
                                    </div>
                                    <p class="text-[0.6rem] leading-tight mt-0.5" x-text="attack.description || 'Attack description'"></p>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 text-[0.5rem] border-t border-black/10 pt-1 mt-auto">
                        <div>
                            <span class="text-gray-600 block">weakness</span>
                            <template x-if="cardData.weakness">
                                <div class="type-icon mt-1 inline-flex items-center justify-center w-4 h-4 rounded-full"
                                     x-bind:class="{
                                        'bg-gradient-to-br from-yellow-300 to-yellow-500': cardData.weakness == 'Electric',
                                        'bg-gradient-to-br from-orange-600 to-orange-800': cardData.weakness == 'Fighting',
                                        'bg-gradient-to-br from-blue-400 to-blue-600': cardData.weakness == 'Water',
                                        'bg-gradient-to-br from-orange-400 to-orange-600': cardData.weakness == 'Fire',
                                        'bg-gradient-to-br from-gray-400 to-gray-600': !cardData.weakness
                                     }">
                                </div>
                            </template>
                            <template x-if="!cardData.weakness">
                                <div class="mt-1 text-gray-400">None</div>
                            </template>
                        </div>
                        <div>
                            <span class="text-gray-600 block">resistance</span>
                            <template x-if="cardData.resistance">
                                <div class="type-icon mt-1 inline-flex items-center justify-center w-4 h-4 rounded-full"
                                     x-bind:class="{
                                        'bg-gradient-to-br from-yellow-300 to-yellow-500': cardData.resistance == 'Electric',
                                        'bg-gradient-to-br from-orange-600 to-orange-800': cardData.resistance == 'Fighting',
                                        'bg-gradient-to-br from-blue-400 to-blue-600': cardData.resistance == 'Water',
                                        'bg-gradient-to-br from-orange-400 to-orange-600': cardData.resistance == 'Fire',
                                        'bg-gradient-to-br from-gray-400 to-gray-600': !cardData.resistance
                                     }">
                                </div>
                            </template>
                            <template x-if="!cardData.resistance">
                                <div class="mt-1 text-gray-400">None</div>
                            </template>
                        </div>
                        <div>
                            <span class="text-gray-600 block">retreat cost</span>
                            <template x-if="cardData.retreat_cost > 0">
                                <div class="mt-1 flex justify-center gap-0.5">
                                    <template x-for="n in parseInt(cardData.retreat_cost)" :key="n">
                                        <div class="energy-symbol w-3 h-3 rounded-full bg-gradient-to-br from-gray-400 to-gray-600"></div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="!cardData.retreat_cost">
                                <div class="mt-1 text-gray-400">None</div>
                            </template>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-[0.45rem] mt-1 italic leading-tight" x-text="cardData.description || 'Pokemon description'"></p>

                    <!-- Card Info -->
                    <div class="text-[0.4rem] mt-1 flex justify-between items-end opacity-80">
                        <div>
                            <span x-text="'Illus. ' + (cardData.artist || 'Artist')"></span>
                            <span x-text="' ©' + cardData.year + ' Nintendo, Creatures, GAMEFREAK. ©' + cardData.year + ' Pokémon.'"></span>
                        </div>
                        <div x-text="(cardData.card_number || '000') + '/' + (cardData.set || 'Set')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<style>
@font-face {
    font-family: 'Pokemon GB';
    src: url('https://cdn.jsdelivr.net/npm/pokemon-font@1.8.1/fonts/pokemon-font.woff2') format('woff2');
}

@font-face {
    font-family: 'Gill Sans Condensed';
    src: local('Gill Sans Condensed'), local('GillSans-Condensed');
}

.pokemon-card {
    box-shadow: 
        0 0 0 1px rgba(0,0,0,0.1),
        0 2px 4px rgba(0,0,0,0.1),
        0 4px 8px rgba(0,0,0,0.1),
        inset 0 0 60px rgba(255,255,255,0.2),
        inset 0 0 15px rgba(255,255,255,0.1);
    animation: holo 6s ease infinite;
    transform-style: preserve-3d;
    perspective: 1000px;
}

@keyframes holo {
    0%, 100% {
        filter: brightness(98%) contrast(105%) saturate(105%);
        transform: rotateY(0deg) rotateX(0deg);
    }
    25% {
        filter: brightness(102%) contrast(110%) saturate(110%);
        transform: rotateY(2deg) rotateX(-1deg);
    }
    75% {
        filter: brightness(102%) contrast(110%) saturate(110%);
        transform: rotateY(-2deg) rotateX(1deg);
    }
}

.type-icon {
    position: relative;
    overflow: hidden;
}

.type-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, transparent 50%);
    mix-blend-mode: overlay;
}

.pokemon-name {
    font-family: 'Pokemon GB', monospace;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    letter-spacing: 0.5px;
}

.card-title {
    font-family: 'Gill Sans Condensed', 'Arial Narrow', sans-serif;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.attack-name {
    font-family: 'Gill Sans Condensed', 'Arial Narrow', sans-serif;
    font-weight: 600;
}

.damage-text {
    font-family: 'Futura', 'Trebuchet MS', sans-serif;
    font-weight: bold;
}

.card-frame {
    background: repeating-linear-gradient(
        -45deg,
        rgba(255,255,255,0.05),
        rgba(255,255,255,0.05) 8px,
        transparent 8px,
        transparent 16px
    );
}

.image-frame {
    box-shadow: 
        inset 0 0 10px rgba(0,0,0,0.3),
        0 1px 2px rgba(0,0,0,0.1);
    background: linear-gradient(135deg, #f0f0e8, #e8e8d8);
}

.energy-symbol {
    position: relative;
    overflow: hidden;
    box-shadow: inset 0 0 3px rgba(0,0,0,0.3);
}

.energy-symbol::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, transparent 50%);
    mix-blend-mode: overlay;
}
</style>
@endpush
@endsection

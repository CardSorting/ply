<div class="pokemon-card-preview">
    <h3 class="pokemon-card-preview__title">Card Preview</h3>
    <div class="pokemon-card-preview__card"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23f3c677\' fill-opacity=\'0.2\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3Ccircle cx=\'13\' cy=\'13\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E');"
         @mouseover="$el.style.transform = 'scale(1.05)'"
         @mouseout="$el.style.transform = 'scale(1)'">
        <div class="absolute inset-0 p-4">
            <div class="flex justify-between items-start bg-gradient-to-r from-transparent via-yellow-100 to-transparent py-1 -mx-4 px-4">
                <div class="font-bold text-lg" x-text="cardData.name || 'Pokemon Name'"></div>
                <div class="font-bold text-red-600" x-text="'HP ' + (cardData.hp || '??')"></div>
            </div>
            <div class="mt-2 text-sm font-semibold" x-text="cardData.type || 'Type'"></div>
            <div class="mt-4 text-xs leading-relaxed" x-text="cardData.description || 'Description will appear here...'"></div>
            
            <div class="mt-4 space-y-2 bg-gradient-to-r from-transparent via-yellow-100 to-transparent py-2 -mx-4 px-4">
                <template x-for="attack in attacks" :key="attack.name">
                    <div class="text-sm flex justify-between items-center">
                        <span class="font-medium" x-text="attack.name || ''"></span>
                        <div class="flex items-center">
                            <span class="text-xs mr-1" x-text="'⚡'.repeat(attack.energyCount)"></span>
                            <span class="font-bold" x-text="attack.damage ? attack.damage + ' DMG' : ''"></span>
                        </div>
                    </div>
                </template>
            </div>
            
            <div class="absolute bottom-4 left-4 right-4 text-xs text-gray-600">
                <div x-text="'Artist: ' + (cardData.artist || '???')"></div>
                <div x-text="cardData.set ? cardData.set + ' ©' + cardData.year : 'Set information'"></div>
            </div>
        </div>
    </div>
    <div class="pokemon-card-preview__info">
        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Preview updates in real-time as you fill out the form</span>
    </div>
</div>

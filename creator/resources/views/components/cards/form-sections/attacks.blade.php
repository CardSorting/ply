<div class="pokemon-card-form__section" x-show="currentStep === 2">
    <div class="flex justify-between items-center border-b pb-2">
        <h3 class="pokemon-card-form__section-title">Attacks</h3>
        <div class="text-sm text-gray-500">Add up to 2 attacks</div>
    </div>
    <div class="space-y-6">
        <template x-for="(attack, index) in attacks" :key="index">
            <div class="flex items-center space-x-4 p-6 bg-gray-50 rounded-lg border border-gray-200 hover:border-blue-500 transition-colors duration-200"
                 :class="{
                     'border-green-500 bg-green-50': attack.name?.trim() && Number(attack.damage) >= 0 && attack.description?.trim(),
                     'border-red-200 bg-red-50': (attack.name === '' || attack.damage === '' || attack.description === '') && currentStep === 2
                 }">
                <div class="pokemon-card-form__input-group flex-1">
                    <label :for="'attacks['+index+'][name]'" class="pokemon-card-form__label">Name</label>
                    <input type="text" :name="'attacks['+index+'][name]'" x-model="attack.name"
                           placeholder="Attack name"
                           class="pokemon-card-form__input"
                           required>
                </div>
                <div class="pokemon-card-form__input-group flex-1">
                    <label :for="'attacks['+index+'][damage]'" class="pokemon-card-form__label">Damage</label>
                    <input type="number" :name="'attacks['+index+'][damage]'" x-model="attack.damage"
                           placeholder="10-200"
                           class="pokemon-card-form__input"
                           required
                           min="0"
                           max="200">
                </div>
                <div class="pokemon-card-form__input-group flex-1">
                    <label :for="'attacks['+index+'][energyCount]'" class="pokemon-card-form__label">Energy Cost</label>
                    <input type="number" :name="'attacks['+index+'][energyCount]'" x-model="attack.energyCount"
                           min="1" max="4" class="pokemon-card-form__input">
                </div>
                <div class="pokemon-card-form__input-group flex-1">
                    <label :for="'attacks['+index+'][description]'" class="pokemon-card-form__label">Effect</label>
                    <input type="text" :name="'attacks['+index+'][description]'" x-model="attack.description"
                           placeholder="Attack effect description"
                           class="pokemon-card-form__input"
                           required>
                </div>
                <button type="button" 
                        @click="removeAttack(index)" 
                        class="pokemon-card-form__button pokemon-card-form__button--danger">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Remove
                </button>
            </div>
        </template>
        <div class="flex justify-center">
            <button type="button" 
                    x-show="attacks.length < 2"
                    @click="addAttack()"
                    class="pokemon-card-form__button pokemon-card-form__button--primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Attack
            </button>
        </div>
    </div>
</div>

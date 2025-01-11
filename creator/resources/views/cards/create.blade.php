@extends('layouts.app')

@section('content')
<div x-data="sessionHandler" x-init="init()" class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Session handler for alerts -->
    <div x-show="showExpiredAlert" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0 transform -translate-y-2" 
         x-transition:enter-end="opacity-100 transform translate-y-0" 
         x-transition:leave="transition ease-in duration-300" 
         x-transition:leave-start="opacity-100 transform translate-y-0" 
         x-transition:leave-end="opacity-0 transform -translate-y-2" 
         class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="rounded-md bg-red-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Session Expired</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <p>Your session has expired. The page will refresh automatically.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form data -->
    <div x-data="formData" x-init="init()">
        <div class="pokemon-card-form">
            <div class="pokemon-card-form__container">
                <div class="pokemon-card-form__grid">
                    <div class="col-span-12">
                        <h2 class="pokemon-card-form__title">Create New Pokemon Card</h2>
                    </div>

                <form action="{{ route('cards.store') }}" method="POST" class="col-span-12"
                      @submit.prevent="cardData.attacks = attacks; $el.submit();"
                      @keydown.meta.s.prevent="$event.preventDefault()"
                      @keydown.ctrl.s.prevent="$event.preventDefault()">
                    @csrf

                    <x-cards.form-layout>
                        <div class="space-y-8">
                            <!-- General Information -->
                            <div class="pokemon-card-form__section">
                                <h3 class="pokemon-card-form__section-title">General Information</h3>
                                <div class="pokemon-card-form__grid-2">
                                    <div class="pokemon-card-form__input-group">
                                        <label for="name" class="pokemon-card-form__label">Pokemon Name</label>
                                        <input type="text" name="name" id="name" x-model="cardData.name"
                                               placeholder="e.g., Pikachu"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Enter the Pokemon's name</div>
                                        @error('name')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="type" class="pokemon-card-form__label">Type</label>
                                        <select name="type" id="type" x-model="cardData.type"
                                                class="pokemon-card-form__input">
                                            <option value="">Select a type</option>
                                            @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="hp" class="pokemon-card-form__label">HP</label>
                                        <input type="number" name="hp" id="hp" x-model="cardData.hp" min="1" max="999"
                                               placeholder="10-999"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Hit points (1-999)</div>
                                        @error('hp')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="category" class="pokemon-card-form__label">Category</label>
                                        <input type="text" name="category" id="category" x-model="cardData.category"
                                               placeholder="e.g., Mouse Pokemon"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Pokemon's category or classification</div>
                                        @error('category')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="length" class="pokemon-card-form__label">Length</label>
                                        <input type="text" name="length" id="length" x-model="cardData.length"
                                               placeholder="e.g., 0.4 m"
                                               class="pokemon-card-form__input">
                                        <div class="pokemon-card-form__help-text">Pokemon's height/length (optional)</div>
                                        @error('length')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="weight" class="pokemon-card-form__label">Weight</label>
                                        <input type="text" name="weight" id="weight" x-model="cardData.weight"
                                               placeholder="e.g., 6.0 kg"
                                               class="pokemon-card-form__input">
                                        <div class="pokemon-card-form__help-text">Pokemon's weight (optional)</div>
                                        @error('weight')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <label for="description" class="pokemon-card-form__label">Description</label>
                                        <textarea name="description" id="description" rows="3" x-model="cardData.description"
                                                  placeholder="Enter a brief description of the Pokemon..."
                                                  class="pokemon-card-form__input"
                                                  required></textarea>
                                        <div class="pokemon-card-form__help-text">Describe the Pokemon's characteristics and traits</div>
                                        @error('description')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Attacks -->
                            <div class="pokemon-card-form__section">
                                <div class="flex justify-between items-center border-b pb-2">
                                    <h3 class="pokemon-card-form__section-title">Attacks</h3>
                                    <div class="text-sm text-gray-500">Add up to 2 attacks</div>
                                </div>
                                <div class="space-y-6">
                                    <template x-for="(attack, index) in attacks" :key="index">
                                        <div class="flex items-center space-x-4 p-6 bg-gray-50 rounded-lg border border-gray-200 hover:border-blue-500 transition-colors duration-200"
                                             :class="{
                                                 'border-green-500 bg-green-50': attacks[index].name?.trim() && Number(attacks[index].damage) >= 0 && attacks[index].description?.trim(),
                                                 'border-red-200 bg-red-50': (attacks[index].name === '' || attacks[index].damage === '' || attacks[index].description === '')
                                             }">
                                            <div class="pokemon-card-form__input-group flex-1">
                                                <label :for="'attacks['+index+'][name]'" class="pokemon-card-form__label">Name</label>
                                                <input type="text" :name="'attacks['+index+'][name]'" x-model="attacks[index].name"
                                                       placeholder="Attack name"
                                                       class="pokemon-card-form__input"
                                                       required>
                                            </div>
                                            <div class="pokemon-card-form__input-group flex-1">
                                                <label :for="'attacks['+index+'][damage]'" class="pokemon-card-form__label">Damage</label>
                                                <input type="number" :name="'attacks['+index+'][damage]'" x-model="attacks[index].damage"
                                                       placeholder="10-200"
                                                       class="pokemon-card-form__input"
                                                       required
                                                       min="0"
                                                       max="200">
                                            </div>
                                            <div class="pokemon-card-form__input-group flex-1">
                                                <label :for="'attacks['+index+'][energyCount]'" class="pokemon-card-form__label">Energy Cost</label>
                                                <input type="number" :name="'attacks['+index+'][energyCount]'" x-model="attacks[index].energyCount"
                                                       min="1" max="4" class="pokemon-card-form__input">
                                            </div>
                                            <div class="pokemon-card-form__input-group flex-1">
                                                <label :for="'attacks['+index+'][description]'" class="pokemon-card-form__label">Effect</label>
                                                <input type="text" :name="'attacks['+index+'][description]'" x-model="attacks[index].description"
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

                            <!-- Additional Stats -->
                            <div class="pokemon-card-form__section">
                                <h3 class="pokemon-card-form__section-title">Additional Stats</h3>
                                <div class="pokemon-card-form__grid-3">
                                    <div class="pokemon-card-form__input-group">
                                        <label for="weakness" class="pokemon-card-form__label">Weakness</label>
                                        <select name="weakness" id="weakness" x-model="cardData.weakness"
                                                class="pokemon-card-form__input"
                                                required>
                                            <option value="">None</option>
                                            @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('weakness')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="resistance" class="pokemon-card-form__label">Resistance</label>
                                        <select name="resistance" id="resistance" x-model="cardData.resistance"
                                                class="pokemon-card-form__input"
                                                required>
                                            <option value="">None</option>
                                            @foreach(['Electric', 'Fighting', 'Normal', 'Water', 'Fire'] as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('resistance')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="retreat_cost" class="pokemon-card-form__label">Retreat Cost</label>
                                        <input type="number" name="retreat_cost" id="retreat_cost" x-model="cardData.retreat_cost" 
                                               min="0" max="4"
                                               placeholder="0-4"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Energy cost to retreat (0-4)</div>
                                        @error('retreat_cost')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Card Information -->
                            <div class="pokemon-card-form__section">
                                <h3 class="pokemon-card-form__section-title">Card Information</h3>
                                <div class="pokemon-card-form__grid-2">
                                    <div class="pokemon-card-form__input-group">
                                        <label for="card_number" class="pokemon-card-form__label">Card Number</label>
                                        <input type="text" name="card_number" id="card_number" x-model="cardData.card_number"
                                               placeholder="e.g., 025/151"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Card's number in the set</div>
                                        @error('card_number')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="artist" class="pokemon-card-form__label">Artist</label>
                                        <input type="text" name="artist" id="artist" x-model="cardData.artist"
                                               placeholder="Artist's name"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Card illustrator's name</div>
                                        @error('artist')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="set" class="pokemon-card-form__label">Set Name</label>
                                        <input type="text" name="set" id="set" x-model="cardData.set"
                                               placeholder="e.g., Base Set"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Card's set or expansion name</div>
                                        @error('set')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pokemon-card-form__input-group">
                                        <label for="year" class="pokemon-card-form__label">Year</label>
                                        <input type="number" name="year" id="year" x-model="cardData.year"
                                               placeholder="e.g., 2024"
                                               min="1996" :max="new Date().getFullYear()"
                                               class="pokemon-card-form__input"
                                               required>
                                        <div class="pokemon-card-form__help-text">Release year (1996-present)</div>
                                        @error('year')
                                            <p class="pokemon-card-form__error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end space-x-4">
                                <button type="submit" 
                                        class="pokemon-card-form__button pokemon-card-form__button--primary">
                                    Create Card
                                </button>
                            </div>
                        </div>
                    </x-cards.form-layout>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

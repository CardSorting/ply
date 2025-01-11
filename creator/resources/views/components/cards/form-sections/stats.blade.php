<div class="pokemon-card-form__section" x-show="currentStep === 3">
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

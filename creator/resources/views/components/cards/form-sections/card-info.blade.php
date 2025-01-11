<div class="pokemon-card-form__section" x-show="currentStep === 4">
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

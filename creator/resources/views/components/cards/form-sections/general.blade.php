<div class="pokemon-card-form__section" x-show="currentStep === 1">
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

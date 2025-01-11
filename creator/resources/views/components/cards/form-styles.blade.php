@layer components {
    .pokemon-card-form {
        @apply min-h-screen bg-gray-50;
    }

.pokemon-card-form__container {
    @apply max-w-7xl mx-auto px-4 py-12;
}

.pokemon-card-form__grid {
    @apply grid grid-cols-12 gap-8;
}

.pokemon-card-form__title {
    @apply text-3xl font-bold mb-8;
}

.pokemon-card-form__shortcuts {
    @apply mb-6 px-4 py-3 bg-gray-50 rounded-lg text-sm text-gray-600;
}

.pokemon-card-form__progress {
    @apply mb-6 px-4;
}

.pokemon-card-form__progress-bar {
    @apply w-full bg-gray-200 rounded-full h-2.5 mt-2;
}

.pokemon-card-form__progress-fill {
    @apply bg-blue-600 h-2.5 rounded-full transition-all duration-500;
}

.pokemon-card-form__steps {
    @apply mb-8;
}

.pokemon-card-form__step-button {
    @apply w-10 h-10 rounded-full border-2 flex items-center justify-center font-semibold;
}

.pokemon-card-form__step-button--current {
    @apply border-blue-600 bg-blue-600 text-white;
}

.pokemon-card-form__step-button--completed {
    @apply border-green-600 bg-green-600 text-white;
}

.pokemon-card-form__step-button--incomplete {
    @apply border-gray-300 text-gray-300;
}

.pokemon-card-form__section {
    @apply space-y-6 mt-8 border-t pt-8;
}

.pokemon-card-form__section-title {
    @apply text-lg font-medium text-gray-900 border-b pb-2;
}

.pokemon-card-form__grid-2 {
    @apply grid grid-cols-2 gap-6;
}

.pokemon-card-form__grid-3 {
    @apply grid grid-cols-3 gap-6;
}

.pokemon-card-form__input-group {
    @apply space-y-1;
}

.pokemon-card-form__label {
    @apply block text-sm font-medium text-gray-700;
}

.pokemon-card-form__input {
    @apply mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500;
}

.pokemon-card-form__help-text {
    @apply mt-1 text-sm text-gray-500;
}

.pokemon-card-form__error {
    @apply mt-1 text-sm text-red-500;
}

.pokemon-card-form__navigation {
    @apply flex justify-between items-center space-x-4 pt-8 mt-8 border-t border-gray-200;
}

.pokemon-card-form__button {
    @apply inline-flex items-center px-4 py-2 rounded-lg transition-colors duration-200;
}

.pokemon-card-form__button--primary {
    @apply bg-blue-500 text-white hover:bg-blue-600;
}

.pokemon-card-form__button--secondary {
    @apply bg-gray-100 text-gray-700 hover:bg-gray-200;
}

.pokemon-card-form__button--danger {
    @apply bg-red-500 text-white hover:bg-red-600;
}

/* Preview Section Styles */
.pokemon-card-preview {
    @apply bg-white p-8 rounded-xl shadow-lg sticky top-6 space-y-4;
}

.pokemon-card-preview__title {
    @apply text-lg font-medium text-gray-900 mb-6;
}

.pokemon-card-preview__card {
    @apply aspect-[63/88] bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-lg p-4 border-2 border-yellow-300 shadow-xl relative overflow-hidden transform transition-all duration-300 hover:scale-105;
}

.pokemon-card-preview__info {
    @apply mt-4 text-sm text-gray-500 flex items-center space-x-2;
}
}

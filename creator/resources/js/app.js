import './bootstrap';
import Alpine from 'alpinejs';

// Initialize Alpine.js
window.Alpine = Alpine;

// Initialize Alpine.js components
document.addEventListener('alpine:init', () => {
    // Session handler component
    Alpine.data('sessionHandler', () => ({
        showExpiredAlert: false,
        init() {
            this.$watch('showExpiredAlert', value => {
                if (value) {
                    setTimeout(() => {
                        this.showExpiredAlert = false;
                    }, 5000);
                }
            });
        },
        handleSessionExpired() {
            this.showExpiredAlert = true;
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        }
    }));

    // Form data component
    Alpine.data('formData', () => ({
        isSubmitting: false,
        cardData: {
            name: '',
            type: '',
            hp: '',
            category: '',
            length: '',
            weight: '',
            description: '',
            weakness: '',
            resistance: '',
            retreat_cost: '',
            card_number: '',
            artist: '',
            set: '',
            year: new Date().getFullYear(),
            attacks: []
        },
        attacks: [{ name: '', damage: '0', energyCount: 1, description: '' }],
        init() {
            this.cardData.attacks = this.attacks;
        },
        addAttack() {
            if (this.attacks.length < 2) {
                this.attacks.push({ name: '', damage: '0', energyCount: 1, description: '' });
            }
        },
        removeAttack(index) {
            this.attacks.splice(index, 1);
            if (this.attacks.length === 0) {
                this.attacks.push({ name: '', damage: '0', energyCount: 1, description: '' });
            }
        }
    }));
});

// Start Alpine.js after component registration
Alpine.start();

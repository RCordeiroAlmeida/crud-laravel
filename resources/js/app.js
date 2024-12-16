import './bootstrap';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { createIcons, icons } from 'lucide';

// Inicializa os ícones
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true, // Garante o refresh automático
        }),
    ],
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/APIs/clima.js'
            ],
            refresh: ['resources/views/**', 'resources/css/**', 'resources/js/**'],
        }),
    ],
    optimizeDeps: {
        include: ['jquery', 'chart.js']
    }
});

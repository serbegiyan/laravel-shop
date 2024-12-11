import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/user_number.js',
                'resources/js/take_number_list.js'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: 'https://begyian-laravel.site',
    },
});

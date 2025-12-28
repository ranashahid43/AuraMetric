import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            // Add this to ensure absolute URLs are handled correctly in production
            detectTls: false, 
        }),
        tailwindcss(),
    ],
    // Ensure the build directory is correct
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
    },
});

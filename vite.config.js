import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      ...refreshPaths,
    })
  ],
  build: {
    rollupOptions: {
      output: {
        manualChunks: {
          leaflet: ['leaflet'],
          turf: ['@turf/turf'],
        },
      },
    },
    chunkSizeWarningLimit: 1000,
  },
});

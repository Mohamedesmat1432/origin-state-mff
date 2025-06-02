import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      ...refreshPaths,
    })
  ],
  resolve: {
    alias: {
      '@fonts': path.resolve(__dirname, 'resources/fonts'),
    },
  },
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

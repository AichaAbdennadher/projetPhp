import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // ou react si tu utilises React

export default defineConfig({
  plugins: [vue()], // ou react() si tu utilises React
  build: {
    outDir: '../public/assets', // Dossier où les fichiers seront placés dans ton projet PHP
  },
  server: {
    proxy: {
      '/api': 'http://localhost', // Exemple si tu as un backend PHP sur un autre port
    },
  },
});

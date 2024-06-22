import { defineConfig } from 'vite';
import php from 'vite-plugin-php';

export default defineConfig({
  plugins: [php()],
  resolve: {
    alias: {
      'three': '/node_modules/three/build/three.module.js',
      'GLTFLoader': '/node_modules/three/examples/jsm/loaders/GLTFLoader.js',
      'OrbitControls': '/node_modules/three/examples/jsm/controls/OrbitControls.js',
    }
  },
  server: {
    proxy: {
      '^/(?!assets|css|images|models|public|@vite|@id|main.js|style.css)': 'http://localhost:8000',
    },
  },
});

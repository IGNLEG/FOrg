
import vuetify, { transformAssetUrls} from "vite-plugin-vuetify";
export default defineNuxtConfig({
  devtools: {enabled: true},
  ssr: false,
  build: {
    transpile: ['vuetify'],
  },
  css: ['vuetify/lib/styles/main.sass', '@/assets/main.css'],
  modules: [
    (_options, nuxt) => {
      nuxt.hooks.hook('vite:extendConfig', (config) => {
        // @ts-expect-error
        config.plugins.push(vuetify({autoImport: true}))
      })
    },
    ['@nuxtjs/google-fonts', {
      families: {
        'Nunito': true,
        download: true,
        inject: true
      }
    }]
  ],
  vite: {
    vue: {
      template: {
        transformAssetUrls,
      },
    },
    server: {
      watch: {
        usePolling: true, 
      },
    },
  },
  runtimeConfig: {
    public: {
      apiURL: process.env.BACKEND_API_URL || 'http://159.89.16.213/api',
    }
  }
})
export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'CRUD Empleados',
    htmlAttrs: {
      lang: 'es'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    "@plugins/axios.js",
    "@plugins/mixins/validation.js"
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    'bootstrap-vue/nuxt',
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
  ],

  //Configuring the auth for api laravel with Sanctum
  auth: {
    strategies: {
      'laravelSanctum': {
        provider: 'laravel/sanctum',
        url: 'http://localhost:8000',
        endpoints: {
          login: { url: '/api/v1/login', method: 'post'},
          logout: { url: '/api/v1/logout', method: 'post'},
          user: { url: '/api/v1/user', method: 'get', propertyName: 0, autoFetch: true}
        }
      }
    },
    redirect:{
      logout: '/login'
    },
    watchLoggedIn: false,
  },

  axios: {
    baseURL: 'http://localhost:8000',
    credentials: true
  },

  router:{
    middleware: ['clearValidationErrors','auth']
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}

export default defineNuxtConfig({
  serverMiddleware: [
    { path: '/webhook', handler: '~/adapters/craftcms/services/serverMiddleware/webhookServer.js' },
  ],
  ssr: false,
  env: {
    GRAPHQL_URL: process.env.VITE_GRAPHQL_URL,
  },
  image: {
    dir: '../front-end/adapters/craftcms/public',
    provider: 'none'
  },
  plugins: ['~/plugins/apollo-client.js', './adapters/craftcms/plugins/apollo-client.js'],
  modules: ['@nuxt/image', '@nuxtjs/apollo','@nuxtjs/tailwindcss'],

  srcDir:`adapters/${process.env.CMS_TYPE}`,

  apollo: {
    clients: {
      default: {
        httpEndpoint: process.env.VITE_GRAPHQL_URL || undefined,
      },
    },
  },

  compatibilityDate: '2024-07-31',
});


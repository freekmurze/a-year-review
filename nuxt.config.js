export default {
  mode: 'universal',

  head: {
    title: '2019 in reviews',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { 'http-equiv': 'x-ua-compatible', content: 'ie=edge' },
      {
        hid: 'description',
        name: 'description',
        content: '2019 reviews by people in tech',
      },
      { property: 'og:site_name', content: '2019 in reviews' },
      { property: 'og:type', content: 'website' },
      { property: 'og:title', content: '2019 in reviews' },
      {
        property: 'og:description',
        content: '2019 reviews by people in tech',
      },
    ],
    link: [{ rel: 'home', href: 'https://www.a-year-review.tech' }],
  },

  loading: { color: '#3164f2' },

  buildModules: [
    '@nuxtjs/eslint-module',
    '@nuxtjs/tailwindcss',
    '@nuxt/typescript-build',
  ],

  purgeCSS: {
    whitelist: ['dark-mode'],
  },
}

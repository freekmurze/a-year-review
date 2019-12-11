<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'ThemeData',

  data: () => ({
    themes: {
      dark: '(prefers-color-scheme: dark)',
      light: '(prefers-color-scheme: light)',
    },
    isDarkTheme: false,
  }),

  mounted() {
    Object.entries(this.themes).forEach(([theme, mediaQuery]) => {
      const mq: MediaQueryList = window.matchMedia(mediaQuery)
      mq.addListener(this.themeListener)

      if (mq.matches) {
        this.setTheme(theme)
      }
    })
  },

  methods: {
    switchTheme(): void {
      this.setTheme(this.isDarkTheme ? 'light' : 'dark')
    },

    setTheme(theme: string): void {
      this.isDarkTheme = !this.isDarkTheme

      document.body.setAttribute('data-theme', theme)
    },

    themeListener(event: MediaQueryListEvent): void {
      Object.entries(this.themes).forEach(([theme, mediaQuery]) => {
        if (event.media === mediaQuery) {
          this.setTheme(theme)
        }
      })
    },
  },

  render() {
    return this.$scopedSlots.default!({
      isDarkTheme: this.isDarkTheme,
      buttonEvents: {
        click: () => this.switchTheme(),
      },
    }) as any
  },
})
</script>

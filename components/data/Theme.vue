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
    preferedTheme: localStorage.getItem('preferedTheme'),
  }),

  created(): void {
    if (this.preferedTheme) {
      this.setTheme(this.preferedTheme)
    }
  },

  mounted(): void {
    Object.entries(this.themes).forEach(this.initilizeListener)
  },

  methods: {
    switchTheme(): void {
      const theme = this.isDarkTheme ? 'light' : 'dark'

      this.setTheme(theme)
      this.setPreferedTheme(theme)
    },

    setTheme(theme: string): void {
      this.isDarkTheme = theme === 'dark'

      document.body.setAttribute('data-theme', theme)
    },

    setPreferedTheme(preferedTheme: string): void {
      localStorage.setItem('preferedTheme', preferedTheme)
      this.preferedTheme = preferedTheme
    },

    themeListener(event: MediaQueryListEvent): void {
      Object.entries(this.themes).forEach(([theme, mediaQuery]) => {
        if (this.preferedTheme === null && event.media === mediaQuery) {
          this.setTheme(theme)
        }
      })
    },

    initilizeListener([theme, mediaQuery]: [string, string]): void {
      const mq: MediaQueryList = window.matchMedia(mediaQuery)
      mq.addListener(this.themeListener)

      if (this.preferedTheme === null && mq.matches) {
        this.setTheme(theme)
      }
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

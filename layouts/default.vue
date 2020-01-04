<template>
  <div class="font-sans flex flex-col min-h-screen">
    <header class="text-center mx-4">
      <h-one>
        <ui-select id="yearSelector" @change="onYearChange" name="yearSelector">
          <option :selected="isYear(2018)" value="2018">2018</option>
          <option :selected="isYear(2019)" value="2019">2019</option>
        </ui-select>
        in reviews
      </h-one>

      <client-only>
        <theme-switcher class="absolute top-0 right-0 m-8" />
      </client-only>
    </header>

    <nuxt :year="year" />

    <Footer />
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

import Footer from '@/components/Footer.vue'
import HOne from '@/components/ui/HOne.vue'
import UiSelect from '@/components/ui/Select.vue'
import ThemeSwitcher from '@/components/ThemeSwitcher.vue'

export default Vue.extend({
  name: 'Home',

  components: {
    Footer,
    HOne,
    ThemeSwitcher,
    UiSelect,
  },

  computed: {
    year(): Number {
      return Number.parseInt(
        this.$route.params.year
          ? this.$route.params.year
          : (process.env.currentYear as string)
      )
    },
  },

  methods: {
    onYearChange(event: InputEvent): void {
      const target = event.target as HTMLSelectElement

      if (target.value === process.env.currentYear) {
        this.$router.push('/')
      } else {
        this.$router.push(target.value)
      }
    },

    isYear(year: Number): Boolean {
      return this.year === year
    },
  },
})
</script>

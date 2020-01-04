<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'Reviews',

  props: {
    year: {
      type: Number,
      default: Number.parseInt(process.env.currentYear as string),
      required: false,
    },
  },

  data: () => ({
    reviews: [] as any[],
  }),

  async beforeMount() {
    let file = 'reviews.json'

    if (this.year !== Number.parseInt(process.env.currentYear as string)) {
      file = `${this.year}.reviews.json`
    }

    this.reviews = await import(`@/static/${file}`)
  },

  render() {
    return this.$scopedSlots.default!({
      reviews: this.reviews,
    }) as any
  },
})
</script>

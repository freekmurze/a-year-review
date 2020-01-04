<template>
  <main class="container max-w-2xl mx-auto flex-grow px-2">
    <div class="p-4 shadow-md text-jumbo bg-dimmed">
      <strong class="text-default">Is someone's retrospective missing?</strong>
      <br />
      To add a link to the list, update the
      <a-link :href="githubUrl">
        <code class="text-base">reviews.json</code>
      </a-link>
      file and make a PR.
    </div>

    <reviews-data :year="year">
      <list slot-scope="{ reviews }" class="my-16">
        <list-item v-for="review in reviews" :key="review.name">
          <a-link :href="review.link" class="text-3xl">
            {{ review.author }}
          </a-link>
        </list-item>
      </list>
    </reviews-data>
  </main>
</template>

<script lang="ts">
import Vue from 'vue'

import ALink from '@/components/ui/ALink.vue'
import List from '@/components/ui/List.vue'
import ListItem from '@/components/ui/ListItem.vue'
import ReviewsData from '@/components/data/Reviews.vue'

export default Vue.extend({
  name: 'Home',

  head: {
    title: '2018 in reviews',
    meta: [
      {
        hid: 'description',
        name: 'description',
        content: '2018 reviews by people in tech',
      },
      { property: 'og:site_name', content: '2018 in reviews' },
    ],
  },

  components: {
    ALink,
    List,
    ListItem,
    ReviewsData,
  },

  computed: {
    year(): Number {
      return Number.parseInt(
        this.$route.params.year
          ? this.$route.params.year
          : (process.env.currentYear as string)
      )
    },

    githubUrl() {
      const url =
        'https://github.com/Elhebert/a-yearly-review/blob/master/static'
      const file = 'reviews.json'

      if (this.$route.params.year !== process.env.currentYear) {
        return `${url}/${this.$route.params.year}.${file}`
      }

      return `${url}/${file}`
    },
  },
})
</script>

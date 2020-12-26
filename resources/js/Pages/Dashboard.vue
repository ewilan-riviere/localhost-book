<template>
  <app-layout> localhost book </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
// import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    // Welcome,
  },
  props: {
    repositories: {
      type: Array,
      default: () => [],
    },
  },
  mounted() {
    console.log(this.$page)
  },
}
</script>

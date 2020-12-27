<template>
  <div>
    <!-- Background color split screen for large screens -->
    <div
      class="fixed top-0 left-0 w-1/2 h-full bg-white"
      aria-hidden="true"
    ></div>
    <div
      class="fixed top-0 right-0 w-1/2 h-full bg-gray-50"
      aria-hidden="true"
    ></div>
    <div class="relative flex flex-col min-h-screen">
      <!-- Navbar -->
      <navbar />

      <!-- 3 column wrapper -->
      <div class="flex-grow w-full mx-auto max-w-7xl xl:px-8 lg:flex">
        <!-- Left sidebar & main wrapper -->
        <left-sidebar />
        <!-- Activity feed -->
        <div
          class="pr-4 bg-gray-50 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0"
        >
          <div class="pl-6 lg:w-80">
            <div class="pt-6 pb-2">
              <h2 class="text-sm font-semibold">Activity</h2>
            </div>
            <div>
              <ul class="divide-y divide-gray-200">
                <li class="py-4">
                  <div class="flex space-x-3">
                    <img
                      class="w-6 h-6 rounded-full"
                      :src="$page.user.github.avatar_url"
                      alt=""
                    />
                    <div class="flex-1 space-y-1">
                      <div class="flex items-center justify-between">
                        <h3 class="text-sm font-medium">You</h3>
                        <p class="text-sm text-gray-500">1h</p>
                      </div>
                      <p class="text-sm text-gray-500">
                        Deployed Workcation (2d89f0c8 in master) to production
                      </p>
                    </div>
                  </div>
                </li>

                <!-- More items... -->
              </ul>
              <div class="py-4 text-sm border-t border-gray-200">
                <a
                  href="#"
                  class="font-semibold text-indigo-600 hover:text-indigo-900"
                  >View all activity <span aria-hidden="true">&rarr;</span></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import LeftSidebar from './LeftSidebar.vue'
export default {
  components: { Navbar, LeftSidebar },
  name: 'AppLayout',
  mounted() {
    this.popupItem = this.$el
  },
}
</script>

<style lang="postcss" scoped></style>

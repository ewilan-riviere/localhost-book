<template>
  <div class="flex-1 min-w-0 bg-white xl:flex">
    <!-- Account profile -->
    <div
      class="bg-white xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200"
    >
      <div class="py-6 pl-4 pr-6 sm:pl-6 lg:pl-8 xl:pl-0">
        <div class="flex items-center justify-between">
          <div class="flex-1 space-y-8">
            <div
              class="space-y-8 sm:space-y-0 sm:flex sm:justify-between sm:items-center xl:block xl:space-y-8"
            >
              <!-- Profile -->
              <div class="flex items-center space-x-3">
                <div class="flex-shrink-0 w-12 h-12">
                  <img
                    class="w-12 h-12 rounded-full"
                    :src="$page.user.github.avatar_url"
                    alt=""
                  />
                </div>
                <div class="space-y-1">
                  <div class="text-sm font-medium text-gray-900">
                    {{ $page.user.github.name }}
                  </div>
                  <a
                    :href="$page.user.github.html_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group flex items-center space-x-2.5"
                  >
                    <icon name="github" :size="20" class="text-gray-400" />
                    <span
                      class="text-sm font-medium text-gray-500 group-hover:text-gray-900"
                    >
                      {{ $page.user.github.login }}
                    </span>
                  </a>
                </div>
              </div>
              <!-- Action buttons -->
              <div class="flex flex-col sm:flex-row xl:flex-col">
                <button
                  type="button"
                  class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 xl:w-full"
                >
                  New Project
                </button>
                <button
                  type="button"
                  class="inline-flex items-center justify-center px-4 py-2 mt-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 xl:ml-0 xl:mt-3 xl:w-full"
                >
                  Invite Team
                </button>
              </div>
            </div>
            <!-- Meta info -->
            <div
              class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-6"
            >
              <div class="flex items-center space-x-2">
                <!-- Heroicon name: badge-check -->
                <svg
                  class="w-5 h-5 text-gray-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"
                  />
                </svg>
                <span class="text-sm font-medium text-gray-500"
                  >Pro Member</span
                >
              </div>
              <div class="flex items-center space-x-2">
                <!-- Heroicon name: collection -->
                <svg
                  class="w-5 h-5 text-gray-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                  />
                </svg>
                <span class="text-sm font-medium text-gray-500">
                  {{ $page.repositories.length }} Virtual Host<span
                    v-if="$page.repositories.length > 1"
                    >s</span
                  >
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Projects List -->
    <virtual-host-list />
  </div>
</template>

<script>
import VirtualHostList from './VirtualHostList.vue'
export default {
  name: 'LeftSidebar',
  components: {
    VirtualHostList,
  },
}
</script>

<style lang="postcss" scoped></style>

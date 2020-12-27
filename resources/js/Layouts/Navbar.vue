<template>
  <nav class="flex-shrink-0 bg-indigo-600">
    <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Logo section -->
        <div class="flex items-center px-2 lg:px-0 xl:w-64">
          <div class="flex-shrink-0">
            <img
              class="w-auto h-8"
              src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg"
              alt="Workflow"
            />
          </div>
        </div>

        <!-- Search section -->
        <div class="flex justify-center flex-1 lg:justify-end">
          <div class="w-full px-2 lg:px-6">
            <label for="search" class="sr-only">Search projects</label>
            <div class="relative text-indigo-200 focus-within:text-gray-400">
              <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
              >
                <!-- Heroicon name: search -->
                <svg
                  class="w-5 h-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <input
                id="search"
                name="search"
                class="block w-full py-2 pl-10 pr-3 leading-5 text-indigo-100 placeholder-indigo-200 bg-indigo-400 bg-opacity-25 border border-transparent rounded-md focus:outline-none focus:bg-white focus:ring-0 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm"
                placeholder="Search projects"
                type="search"
              />
            </div>
          </div>
        </div>
        <div class="flex lg:hidden">
          <!-- Mobile menu button -->
          <button
            class="inline-flex items-center justify-center p-2 text-indigo-400 bg-indigo-600 rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white"
            aria-expanded="false"
            @click="mobileMenu = !mobileMenu"
          >
            <span class="sr-only">Open main menu</span>
            <!-- Icon when menu is closed. -->
            <!--
              Heroicon name: menu-alt-1

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg
              :class="mobileMenu ? 'hidden' : 'block'"
              class="w-6 h-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h8m-8 6h16"
              />
            </svg>
            <!-- Icon when menu is open. -->
            <!--
              Heroicon name: x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg
              :class="mobileMenu ? 'block' : 'hidden'"
              class="w-6 h-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
        <!-- Links section -->
        <div class="hidden lg:block lg:w-80">
          <div class="flex items-center justify-end">
            <div class="flex">
              <a
                href="phpinfo"
                class="px-3 py-2 text-sm font-medium text-indigo-200 rounded-md hover:text-white"
              >
                phpInfo
              </a>
              <a
                href="#"
                class="px-3 py-2 text-sm font-medium text-indigo-200 rounded-md hover:text-white"
                >Support</a
              >
            </div>
            <!-- Profile dropdown -->
            <div
              class="relative flex-shrink-0 ml-4"
              v-click-outside="profileMenuHide"
              @click="profileMenuToggle"
            >
              <div>
                <button
                  class="flex text-sm text-white bg-indigo-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white"
                  id="user-menu"
                  aria-haspopup="true"
                >
                  <span class="sr-only">Open user menu</span>
                  <img
                    class="w-8 h-8 rounded-full"
                    :src="$page.user.github.avatar_url"
                    alt=""
                  />
                </button>
              </div>
              <!--
                Profile dropdown panel, show/hide based on dropdown state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div
                :class="
                  profileMenu ? 'opacity-100 scale-100' : 'opacity-0 scale-95'
                "
                class="absolute right-0 w-48 py-1 mt-2 transition duration-100 ease-out origin-top-right transform bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5"
                role="menu"
                aria-orientation="vertical"
                aria-labelledby="user-menu"
              >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  >View Profile</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  >Settings</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  >Logout</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--
      Mobile menu, toggle classes based on menu state.

      Menu open: "block", Menu closed: "hidden"
    -->
    <div :class="mobileMenu ? 'block' : 'hidden'" class="lg:hidden">
      <div class="px-2 pt-2 pb-3">
        <a
          href="#"
          class="block px-3 py-2 text-base font-medium text-white bg-indigo-800 rounded-md"
          >Dashboard</a
        >
        <a
          href="#"
          class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-indigo-600"
          >Support</a
        >
      </div>
      <div class="pt-4 pb-3 border-t border-indigo-800">
        <div class="px-2">
          <a
            href="#"
            class="block px-3 py-2 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-indigo-600"
            >Your Profile</a
          >
          <a
            href="#"
            class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-indigo-600"
            >Settings</a
          >
          <a
            href="#"
            class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-indigo-600"
            >Sign out</a
          >
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import ClickOutside from 'vue-click-outside'

export default {
  name: 'Navbar',
  data() {
    return {
      profileMenu: false,
      mobileMenu: false,
    }
  },
  methods: {
    profileMenuToggle() {
      this.profileMenu = !this.profileMenu
    },
    profileMenuHide() {
      this.profileMenu = false
    },
  },
  directives: {
    ClickOutside,
  },
}
</script>

<style lang="postcss" scoped></style>

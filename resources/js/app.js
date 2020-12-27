require('./bootstrap')

require('moment')

import Vue from 'vue'
import VueMeta from 'vue-meta'

import IconBase from './components/IconBase'

Vue.use(VueMeta, {
  // optional pluginOptions
  refreshOnceOnNavigation: true,
})

import { InertiaApp } from '@inertiajs/inertia-vue'
import { InertiaForm } from 'laravel-jetstream'
import PortalVue from 'portal-vue'

Vue.mixin({ methods: { route } })
Vue.use(InertiaApp)
Vue.use(InertiaForm)
Vue.use(PortalVue)
Vue.component('icon-base', IconBase)
Vue.component('icon', require('./components/icon.js').default)

import './plugins/icons-loader'

const app = document.getElementById('app')

new Vue({
  render: (h) =>
    h(InertiaApp, {
      props: {
        initialPage: JSON.parse(app.dataset.page),
        resolveComponent: (name) => require(`./Pages/${name}`).default,
      },
    }),
}).$mount(app)

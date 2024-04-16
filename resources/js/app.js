import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/index.js';

import './bootstrap';
import './bootstrap.min';
import './main';
import '../css/app.css';
import '../css/bootstrap.min.css';
import '../css/style.css';


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
    progress: {
        showSpinner: true,
        delay: 1,
        color: 'red',
    }
})
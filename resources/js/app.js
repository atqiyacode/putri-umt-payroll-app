import './bootstrap';
import 'primevue/resources/themes/saga-blue/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
// import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import Dialog from 'primevue/dialog';
import ScrollPanel from 'primevue/scrollpanel';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup'; //optional for column grouping
import Row from 'primevue/row';
import Tooltip from 'primevue/tooltip';

const appName = window.document.getElementsByTagName('title')[0].innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        let appVue = createApp({ render: () => h(app, props) });

        appVue.directive('tooltip', Tooltip);

        appVue.use(plugin)
        appVue.use(PrimeVue)
        appVue.use(ConfirmationService)
        appVue.use(ToastService)
        appVue.directive('tooltip', Tooltip);
        appVue.component('p-dialog', Dialog);
        appVue.component('p-scroll-panel', ScrollPanel);
        appVue.component('p-datatable', DataTable);
        appVue.component('p-column', Column);
        appVue.component('p-column-group', ColumnGroup);
        appVue.component('p-row', Row);

        appVue.use(ZiggyVue, Ziggy)
        appVue.mount(el)

        return appVue
    },
});

InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#4B5563',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: false,
})
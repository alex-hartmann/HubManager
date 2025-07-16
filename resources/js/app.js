import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import Toast, { POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faPenToSquare, faTrashCan, faCheck, faRotateLeft, faArrowTrendUp, faArrowTrendDown, faClock} from "@fortawesome/free-solid-svg-icons";

library.add(faPenToSquare, faTrashCan, faCheck, faRotateLeft, faArrowTrendUp, faArrowTrendDown, faClock);

const toastOptions = {
    position: POSITION.TOP_RIGHT, // Ex: "top-right", "bottom-left", etc.
    timeout: 3000, // Duração do toast em ms
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: false,
    closeButton: "button",
    icon: true,
    rtl: false,
};

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toast, toastOptions)
            .component("font-awesome-icon", FontAwesomeIcon)
            .mount(el);
        
    },
    progress: {
        color: "#4B5563",
    },
});

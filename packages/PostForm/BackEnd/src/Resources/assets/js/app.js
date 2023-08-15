import { createApp } from 'vue';
import axios from 'axios'
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

window.app = createApp({
    data() {
      return {}
    },
});

window.axios = axios;

window.addEventListener("load", function (event) {
    app.mount("#app");
});

window.toast = useToast();
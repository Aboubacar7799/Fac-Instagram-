import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import FollowButton from './components/FollowButton.vue';



const siExiste = document.getElementById('app')
if (siExiste) {
    const app = createApp({
        components: {
            FollowButton,
        },
    });
    app.component('followbutton', FollowButton);
    app.mount("#app");

        require('./like.js');
}
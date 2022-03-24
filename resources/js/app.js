import Vue from 'vue';
import App from './components/App.vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    render: h => h(App),
});

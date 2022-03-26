import Vue from 'vue';
import Crud from './components/Crud.vue';
import axios from 'axios';


new Vue({
    el: '#app',
    components: {
        'crud': Crud,
    }
    //render: h => h(App),
});


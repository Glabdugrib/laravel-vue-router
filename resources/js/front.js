// AXIOS
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VUE
window.Vue = require('vue');

import App from './views/App.vue';

import router from './router';


const app = new Vue({
   el: '#root',
   render: h => h(App),
   router
}).$mount('#app')

require('./bootstrap');

import Vue from "vue";
import VueCsrf from 'vue-csrf';
 


Vue.component('Flicker', require('./components/Flicker.vue').default);
Vue.component('FlickerDetail', require('./components/FlickerDetail.vue').default);
Vue.component('FlickerForm', require('./components/FlickerForm.vue').default);
Vue.component('modal', require('./components/modal.vue').default);

new Vue().$mount("#app");
Vue.use(VueCsrf);


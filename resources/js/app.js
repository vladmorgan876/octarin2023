
require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('pagination', require('laravel-vue-pagination'));

import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

Vue.component('navcomponent', require('./components/navcomponent.vue').default);
Vue.component('maincomponent', require('./components/maincomponent.vue').default);
Vue.component('contactcomponent', require('./components/contactcomponent.vue').default);
Vue.component('cartcomponent', require('./components/cartcomponent.vue').default);
Vue.component('FormOrderComponent', require('./components/FormOrderComponent.vue').default);
Vue.component('footercomponent', require('./components/footercomponent.vue').default);
Vue.component('CaruselComponent2', require('./components/CaruselComponent2.vue').default);
Vue.component('CatalogVuexComponent', require('./components/CatalogVuexComponent.vue').default);
Vue.component('ThreeComponent', require('./components/ThreeComponent.vue').default);
Vue.component('ThreeComponent2', require('./components/ThreeComponent2.vue').default);
Vue.component('quickSelectionComponent', require('./components/quickSelectionComponent.vue').default);
Vue.component('AboutUsButtonComponent', require('./components/AboutUsButtonComponent.vue').default);
Vue.component('MessageFromUserComponent', require('./components/MessageFromUserComponent.vue').default);
Vue.component('AboutUsComponent', require('./components/AboutUsComponent.vue').default);
Vue.component('WarningTransparensyComponent', require('./components/WarningTransparensyComponent.vue').default);
Vue.component('GetProductByCategoryComponent', require('./components/GetProductByCategoryComponent.vue').default);


import router from './router';
const app = new Vue({
    el: '#app',
    router,
    store, //vuex
});

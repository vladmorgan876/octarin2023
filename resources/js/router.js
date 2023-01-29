import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import maincomponent from './components/maincomponent.vue';
import contactcomponent from './components/contactcomponent.vue';
import cartcomponent from './components/cartcomponent.vue';
import FormOrderComponent from './components/FormOrderComponent.vue';
import quickSelectionComponent from './components/quickSelectionComponent.vue';
import CaruselComponent2 from './components/CaruselComponent2.vue';
import CatalogVuexComponent from './components/CatalogVuexComponent.vue';
import ThreeComponent from './components/ThreeComponent.vue';
import ThreeComponent2 from './components/ThreeComponent2.vue';
import AboutUsButtonComponent from './components/AboutUsButtonComponent.vue';
import MessageFromUserComponent from './components/MessageFromUserComponent.vue';
import AboutUsComponent from './components/AboutUsComponent.vue';
import WarningTransparensyComponent from './components/WarningTransparensyComponent.vue';
import GetProductByCategoryComponent from './components/GetProductByCategoryComponent.vue';


const routes = [
    {
        path: '/GetProductByCategory/:category',
        component: GetProductByCategoryComponent,
        params:true
    },

    {
        path: '/WarningTransparensy',
        component: WarningTransparensyComponent
    },
    {
        path: '/AboutUs',
        component: AboutUsComponent
    },
    {
        path: '/MessageFromUser',
        component: MessageFromUserComponent
    },
    {
        path: '/CatalogVuex',
        component: CatalogVuexComponent
    },
    {
        path: '/Three',
        component: ThreeComponent
    },
    {
        path: '/Three2',
        component: ThreeComponent2
    },
    {
        path: '/quickSelection',
        component: quickSelectionComponent
    },
    {
        path: '/',
        name: 'main',
        component: maincomponent
    },
    {
        path: '/contact',
        component: contactcomponent
    },
    {
        path: '/cart',
        component: cartcomponent
    },
    {
        path: '/formorder',
        component: FormOrderComponent
    },
    {
        path: '/Carusel2',
        component: CaruselComponent2
    },

    {
        path: '/AboutUsButton',
        component: AboutUsButtonComponent
    },
]

export default new VueRouter({ mode: 'history', routes: routes })

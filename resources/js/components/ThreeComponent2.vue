<template>
    <div>
        <canvas id="canvas"></canvas>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import {earth3d} from '../MyClass/Fons3d';
//import {earth3d} from '../MyClass/FonsTest';
//import {fire} from '../MyClass/Fire';
export default {
    name: "ThreeComponent2",
    data(){
        return{

        }
    },
    methods: {
        flagscreen: function () {
            this.$store.dispatch('ActionFlagScreen', 'shown');
        },
        ...mapActions([
            'GET_PRODUCTS_FROM_API'
        ]),
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
       // fire();
        earth3d();
        setTimeout(this.flagscreen, 15000);
    }
}
</script>

<style scoped>
#canvas{
    position: absolute;
    top: 0;
    left: 0;
    background-image:url("/storage/newimage/cosmos.jpg");
    width: 100%;
    height: 100%;

}
</style>

<template>
    <div>
        <div v-if="show===true" class="warningText" v-on:click="hidden">
            <div id="bg-3">
                <h5>OOPS))) Анонимные и пустые сообщения не отсылаются.Кликните, чтобы закрыть.</h5>
            </div>
        </div>
    </div>
</template>

<script>
import {fon3d} from '../MyClass/Fons3d.js'
export default {
    name: "WarningTransparensyComponent",
    data() {
        return {
            show:true,
        }
    },
    methods:{
        hidden:function (){
            this.show=false;
        }
    },
    mounted() {
        fon3d();
    }
}
</script>

<style scoped>
#bg-3 {
    width: 400px;
    height: 400px;
    opacity: 0.9;
}
.warningText {
    opacity: 1;
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 8rem;
    left: 25rem;
    z-index: 6;
    width: 22rem;
    height: 22rem;
    /*border: red .2rem solid;*/
    border-radius: 50%;
    background-color: white;
    overflow: hidden;
    box-shadow: white 0 0 20px;
}
.warningText h5{
    color: white;
    top: 125px;
    left: 20px;
    position: absolute;
    text-align: center;
    margin: 0
}
</style>

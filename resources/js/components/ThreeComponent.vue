<template>
    <div>
        <div id="bg-3">
            <CaruselComponent2 class="carus"></CaruselComponent2>
        </div>
    </div>

</template>

<script>
import {fon3d} from '../MyClass/Fons3d.js'
export default {
    name: "ThreeComponent",
    data() {
        return {}
    },
    mounted() {
        fon3d();
    }
}
</script>

<style scoped>
#bg-3 {
    width: 100%;
    height: 260px;
    margin: 20px 0;
    opacity: 0.9;
}
.carus{
    position: absolute;
    top: 9rem;
    left: 35rem;

}
</style>

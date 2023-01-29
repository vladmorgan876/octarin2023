<template>
    <div class="cart">
        <div v-if="$store.state.cart.length===0" class="text" v-on="routeInCatalog()">
            <h3>Ваша корзина пуста,сделайте пожалуйста свой выбор)))</h3>
        </div>
        <div  class="container" v-for="(el,index) in $store.state.cart" v-bind:key="el.name">
            <img class="imgcart" v-bind:src="'/storage/'+el.image">
            <div class="info">
                <div><h5> {{el.name}}</h5></div>
            </div>
            <div>
                <div class="but">
                </div>
                <div class="but">
                    <a href="#" class="close-btn " title="добавить единицу данного товара в корзину" v-on:click="additem(el)">+</a>
                    <a href="#" class="close-btn " title="удалить единицу данного товара из корзины" v-on:click="delitem(el,index)">-</a>
                    <a href="#" class="close-btn " title="удалить товар из корзины" v-on:click="delcard(el,index)">&times;</a>
                    <div class="sum">
                        <div><h5>выбрано: {{el.defaultINcart}} шт.</h5></div>
                        <div><h5>на сумму: {{el.defaultINcart*el.price}} грн.</h5></div>
                    </div>
                    <div class="order"><router-link class="nav-link" to="/formorder">Оформить заказ</router-link></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    name: 'catrcomponent',
    data() {
        return {
            products: [],
            total: [],
            finalViewCart:[],
        }
    },
    methods:{
        delcard: function (el,index) {
             this.$store.state.cart.splice(index,1);
            this.$store.state.totalsum=this.$store.state.totalsum-el.defaultINcart*el.price;
            this.$store.state.count=this.$store.state.count-el.defaultINcart;
            el.defaultINcart =0;
        },
        additem:function (el){
            this.$store.dispatch('TOCART', el);
        },
        delitem: function (el, index) {
            if (el.defaultINcart <= 1) {
                this.delcard(el,index);
            } else {
                el.defaultINcart = el.defaultINcart - 1;
                this.$store.state.totalsum=this.$store.state.totalsum-el.price;
                this.$store.state.count=this.$store.state.count-1;
            }
        },
        routeInCatalog:function (){
            window.location.href = "/";
        }
    },
    mounted() {
    },
    computed: {

        }
};
</script>

<style scoped>

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    top: 0;
    left: 0;
    width: 80%;
    height: auto;
    margin-top: 2em;
    border: white 1px solid;
    box-shadow: 0 0 2em white;
}

.imgcart {
    width: 200px;
    height: 250px;
    border: 3px solid white;
}

.but {
    position: relative;
    top: -150px;
    display: flex;
    margin-top: 80px;
    margin-left: 50px;
    z-index: 5;
}
.close-btn {
    position: relative;
    top: 10px;
    left: 330px;
    color: dodgerblue;
    font-size: 30px;
    text-decoration: none;
    margin-left: 30px;
    cursor: pointer;
}
.order {
    width: 250px;
    height: 50px;
    position: relative;
    display: flex;
    justify-content: center;
    top: 180px;
    left: -3em;
}
.sum {
    position: relative;
    width: 200px;
    height: 90px;
    top: 80px;
    left: 100px;
}
.info {
    position: absolute;
    width: 200px;
    height: 50px;
    left: 550px;
}
.text {
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}
.cart{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size: 100%;
    margin-top: 8em;
}
h5{
    color: white;
}
</style>

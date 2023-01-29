<!--смотри splashscreen;-->
<!--смотри index.js-->
<template>
    <div class="fon">
        <div v-if="this.watcher"></div>
        <div  class="productsINcatalog">
            <div class="products" v-for="(product,index) in this.productByCategory" :key="product.model">
                <div class="card-header">
                    <div class="card-text" style="color: white">{{ product.category }}</div>
                </div>
                <div  v-on:click="zoom(product.image)" class="card text-center" style="width: 18rem;">
                    <img v-bind:src="'/storage/'+product.image" alt="image">
                    <div class="card-body ">
                        <h5 class="card-text">{{ product.name }}</h5>
                        <div class="card-text">{{ product.price }}</div>
                        <button onclick="event.stopPropagation()" v-on:click="addTOcart(product)" class="btn btn-outline-secondary">в корзину</button>
                    </div>
                </div>
            </div>
            <div  onclick="event.stopPropagation()" id="zoomPicture" class="zoomPicture" v-on:click="closePicture()"><img v-bind:src="this.pictureZoom" alt="image"></div>
        </div>
        <div class="add"></div>
    </div>
</template>
<script>

import {MyStaticClass} from "../MyClass/MyStaticClass";
import {mapActions} from "vuex";
export default {
    name: "GetProductByCategoryComponent",
    data(){
        return{
            productByCategory:[],
            path:"/storage/",
            pictureZoom:'',
            categoryProduct:''
        }
    },
    created() {

    },
    // watch: {
    //     '$route.params.category': {
    //         immediate: true,
    //         handler() {
    //             this.productByCategory=[];
    //             this.categoryProduct = this.$route.params.category;
    //             for (let i=0;i<this.$store.state.products.length;i++){
    //                 if(this.$store.state.products[i].category===this.categoryProduct){
    //                     this.productByCategory.push(this.$store.state.products[i])
    //                 }
    //             }
    //         },
    //     },
    // },
    // или так:
    computed:{
    watcher:function (){
    this.productByCategory=[];
    this.categoryProduct = this.$route.params.category;
    for (let i=0;i<this.$store.state.products.length;i++){
        if(this.$store.state.products[i].category===this.categoryProduct){
            this.productByCategory.push(this.$store.state.products[i])
        }
    }
}
    },
     mounted() {
         this.GET_PRODUCTS_FROM_API();
    //
    //     for (let i=0;i<this.$store.state.products.length;i++){
    //         if(this.$store.state.products[i].category===this.categoryProduct){
    //             this.ring.push(this.$store.state.products[i])
    //         }
    //     }
     },

    methods:{
        addTOcart: function (product) {
            this.$store.dispatch('TOCART', product);
        },
        zoom:function (image){
            this.pictureZoom=this.path+image;
            MyStaticClass.showZoomImage();
        },
        closePicture:function (){
            MyStaticClass.closeZoomImage();
        },
        ...mapActions([
            'GET_PRODUCTS_FROM_API'
        ]),
    },
}
</script>

<style scoped>
.fon{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size:100%,50%;
    margin-top: 3em;
}
.productsINcatalog {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-left: -3em;
    margin-top: 2rem;
}
.products {
    width: 12.4em;
    height: 23em;
    margin-top: 3em;
    margin-left: 3em;
    box-shadow: 1em 1em 2em grey;
    border: 3px solid white;
    border-radius: 0.5em;
    overflow: hidden;
}
img {
    width: 13em;
    height: 13em;
}
.card-text{
    font-family: "Noto Sans";
}
.card-body{
    margin-top: -1em;
    margin-left: -5.5rem;
}
.add{
    width: 100%;
    height: 80px;
}
.zoomPicture{
    display: none;
    position: fixed;
    top: 95px;
    left: 385px;
    box-shadow: grey 20px 20px 20px;
    border: solid 3px white;
    border-radius: 50%;
    height: 450px;
    width: 450px;
    z-index: 5;
    overflow: hidden;
    animation: slide .5s;


}
@keyframes slide {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
.zoomPicture img{
    width: 100%;
    height: 100%;
}
</style>

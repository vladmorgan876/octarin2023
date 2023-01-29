<template>
    <div class="fon">
        <div style="margin-top: 100px" class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="test">
                        <h3 v-if="this.finalSelect"></h3>
                        <h5 style="text-align: center;color: white;margin-top: 50px">Выбрать категорию товара</h5>
                        <div  style="display: flex;position: relative;top: 30px;left: 200px">
                            <input id="mytoggle" class="circle" type="checkbox" value="ring"  v-model="checkedCategory" >
                            <label for="mytoggle"></label>
                            <h5  class="word2" style="margin-left: 10px">кольца</h5>
                        </div>
                        <div  style="display: flex;position: relative;top: 30px;left: 200px">
                            <input id="mytoggle2" class="circle" type="checkbox" value="bracelet"  v-model="checkedCategory" >
                            <label for="mytoggle2"></label>
                            <h5  class="word2" style="margin-left: 10px">браслеты</h5>
                        </div>
                        <div  style="display: flex;position: relative;top: 30px;left: 200px">
                            <input id="mytoggle3" class="circle" type="checkbox" value="pendant"  v-model="checkedCategory" >
                            <label for="mytoggle3"></label>
                            <h5  class="word2" style="margin-left: 10px">кулоны</h5>
                        </div>
                        <h5 style="text-align: center;margin-top: 50px;color: white">Выбрать диапазон цен</h5>
                        <vue-slider style="width: 600px;position: relative;left: 60px;top: 40px;color: white" v-model="selectValue" v-bind="options"/>
                    </div>
                    <h5 v-if="this.resultSelect.length>0" style="text-align: center;color: white">Товар соответствующий данным требованиям</h5>
                    <div  class="productsINcatalog">
                        <div class="products" v-for="(product,index) in this.resultSelect" :key="product.model">
                            <div class="card-header">
                                <div class="card-text" style="color: red">{{ product.category }}</div>
                            </div>
                            <div  v-on:click="zoom(product.image)" class="card text-center" style="width: 18rem;">
                                <img v-bind:src="'/storage/'+product.image">
                                <div class="card-body ">
                                    <h5 class="card-text">{{ product.name }}</h5>
                                    <div class="card-text">{{ product.price }}</div>
                                    <button onclick="event.stopPropagation()" v-on:click="addTOcart(product)" class="btn btn-outline-secondary">в корзину</button>
                                </div>
                            </div>
                        </div>
                        <div  onclick="event.stopPropagation()" id="zoomPicture" class="zoomPicture" v-on:click="closePicture()"><img v-bind:src="this.pictureZoom" alt="image"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add"></div>
    </div>
</template>

<script>
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
import {MyStaticClass} from "../MyClass/MyStaticClass";
export default {
    name: "quickSelectionComponent",
    components: {
        VueSlider
    },
    data() {
        return {
            checkedCategory:[],
            resultSelect:[],
            options:{
                min:0,
                max:1000,
                interval:50,
                marks:true,
            },
            selectValue: [0,100],
            path:"/storage/",
            pictureZoom:''

        }
    },
    mounted() {
    },
    methods:{
        zoom:function (image){
            this.pictureZoom=this.path+image;
            MyStaticClass.showZoomImage();
        },
        closePicture:function (){
            MyStaticClass.closeZoomImage();
        },
        addTOcart: function (product) {
            this.$store.dispatch('TOCART', product);
        },
    },
    computed:{
        finalSelect(){
            this.resultSelect=[];
            for(let q=0;q<this.checkedCategory.length;q++){
                for (let i=0;i<this.$store.state.products.length;i++){
                    if(this.$store.state.products[i].category===this.checkedCategory[q] &&
                        this.$store.state.products[i].price<=this.selectValue[1] && this.$store.state.products[i].price >= this.selectValue[0]
                    ){
                        this.resultSelect.push(this.$store.state.products[i])
                    }
                }
            }
        }
    }
}
</script>
<style scoped>
.fon{
    position: relative;
    top: -50px;
    background-image: url("/storage/newimage/fon2.jpg");
    background-size:100%,50%;
}
.add{
    width: 100%;
    height: 80px;
    margin-top:-120px;
}
.test{
    display: block;
    width: 600px;
    height: 400px;
}
label
{
    display: block;
    position: relative;
    cursor: pointer;
}
input.circle + label:before, input.circle + label:after
{
    display: block;
    position: absolute;
    content: "";
}
.circle{
    visibility: hidden;
}
input.circle + label:after
{
    /*кругляк*/
    top: 4px;
    left: 4px;
    bottom: 4px;
    width: 22px;
    height: 22px;
    background-color:grey;
    border-radius: 11px;
    transition: margin 0.4s, background 0.4s;
}
input.circle + label:before
{
    top: 2px;
    left: 2px;
    bottom: 2px;
    right: 2px;
    background-color: white;
    border-radius: 15px;
}
input.circle + label
{
    /*рамка*/
    padding: 2px;
    width: 55px;
    height: 30px;
    background-color: grey;
    border-radius: 15px;
    transition: background 0.4s;
}
input.circle:checked + label
{
    background-color: deepskyblue;
    /*animation: blink 1s linear infinite;*/
    /*мигает вместе с рамкой*/
}
input.circle:checked + label:after
{
    margin-left: 25px;
    background-color: deepskyblue;
    animation: blink 2s linear infinite;
    /*мигает один кругляк*/
}
.word2{
    color: grey;
}
input.circle:checked + label +.word2{
    color: deepskyblue;
    opacity: 1;
}
@keyframes blink {
    from {
        opacity: 1;
    }
    to {
        transform: scale(1);
        opacity: 0;
    }
}
.productsINcatalog {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-left: -3em;
    margin-top: 0;
}
.products {
    width: 12.4em;
    height: 23em;
    margin-top: 1em;
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


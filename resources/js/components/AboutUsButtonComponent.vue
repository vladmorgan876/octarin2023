<template>
   <div class="main">
       <div class="cont">
           <div v-on:click="goToContactComponent" class="card1" ><div class="photo1"><img src="/storage/newimage/image_part_1.jpg" alt="image"><h2 class="text">контакты</h2></div></div>
           <div v-on:click="goToMessageFromUserComponent" class="card2" ><div class="photo2"><img src="/storage/newimage/image_part_2.jpg" alt="image"><h2 class="text">отзывы</h2></div></div>
           <div v-on:click="goToAboutUsComponent" class="card3" ><div class="photo3"><img src="/storage/newimage/image_part_3.jpg" alt="image"><h2 class="text">о нас</h2></div></div>
           <div class="card4" ><div class="photo4"><img src="/storage/newimage/image_part_4.jpg" alt="image"><h2 class="text">что то</h2></div></div>
       </div>
   </div>
</template>
<script>

   export default {
    name:"AboutUsButtonComponent",
    data() {
        return {

        }
    },
    methods: {
        goToContactComponent:function (){
            window.location.href = "/contact";
        },
        goToMessageFromUserComponent:function (){
            window.location.href = "/MessageFromUser";
        },
        goToAboutUsComponent:function (){
            window.location.href = "/AboutUs";
        },

        traffic:function (){
 setTimeout(function (){
    document.getElementsByClassName('cont')[0].style.transform = "rotateZ(360deg) ";
    document.getElementsByClassName('cont')[0].style.left = "100px";
    document.getElementsByClassName('cont')[0].style.height = "480px";
    document.getElementsByClassName('cont')[0].style.width = "480px";

    document.getElementsByClassName('card1')[0].style.top = "0px";
    document.getElementsByClassName('card1')[0].style.left = "0px";

    document.getElementsByClassName('card2')[0].style.top = "0px";
    document.getElementsByClassName('card2')[0].style.left = "240px";

    document.getElementsByClassName('card3')[0].style.top = "240px";

    document.getElementsByClassName('card4')[0].style.top = "240px";
    document.getElementsByClassName('card4')[0].style.left = "240px";

    setTimeout(function () {
        document.getElementsByClassName('cont')[0].style.left = "350px";
        document.getElementsByClassName('cont')[0].style.top = "50px"  ;
        document.getElementsByClassName('cont')[0].style.transform= "rotateX(50deg)  rotateY(10deg) rotateZ(-30deg)";
        },2000)
      },2000)
        },
    },
    mounted() {
             this.traffic();
    },
   }

</script>
<style>
.text{
    color: white;
    position: absolute;
    top: 100px;
    left: 50px;
}
.main {
    width: 190vh;
    height: 90vh;
    background-image: url("/storage/newimage/fon2.jpg");
    overflow: hidden;
}
.cont{
    position: absolute;
    top: 100px;
    left: 1250px;
    width: 240px;
    height: 240px;
    perspective: 1000px;
    transform-style: preserve-3d;
    transition: 3s;
    /*starting line time*/
}
img{width: 100%;height: 100%}
.card1,.card2,.card3,.card4{
    position: absolute;
    top: 0;
    left: 0;
    width: 240px;
    height: 240px;
    perspective: 1000px;
    transform-style: preserve-3d;
    transition: 2s;
   /*time down*/
    backface-visibility: hidden;
}
.photo1,.photo2,.photo3,.photo4{
    position: absolute;
    top: 0;
    left: 0;
    width: 240px;
    height: 240px;
    perspective: 1000px;
    transform-style: preserve-3d;
    backface-visibility: hidden;
}
.card1:hover,.card2:hover,.card3:hover,.card4:hover {
    cursor: pointer;
    transform:translateZ(30px);
    transition: .5s;
    /*time up*/
    box-shadow: white 0 0 20px,white 0 0 40px,white 0 0 80px;
}
</style>

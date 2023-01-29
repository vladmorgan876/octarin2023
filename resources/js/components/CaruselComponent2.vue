<template>
    <div>

        <div id="fon" >
            <div  id="carousel">
                <div  id="drag-container">
                    <div  id="spin-container">
                        <img  src="/storage/newimage/6SNxUTume7wteNK4lDEfwtkmrop97YF0kmNxP5LZ.jpg" alt="image">
                        <img  src="/storage/newimage/EMzIasbmIDfoxcgdtim9Pc4T59XEOcfhjAb0Qtv1.jpg" alt="image">
                        <img  src="/storage/newimage/fznBPMe0ClDOSIX4t9EnDO3zpzP1w12sP4Stu4oh.jpg" alt="image">
                        <img  src="/storage/newimage/8oT90MD3Y3JLNIitsEzgCcaf8aX66tcEi3oMoMlp.jpg" alt="image">
                        <img  src="/storage/newimage/jM7ihbSXnATH9Lnimrs0Y91fL6R7eNMBFhqsJSmH.jpg" alt="image">
                        <img  src="/storage/newimage/KgNOAc3PdoohZXBixP9UkiJymCekVbBQsBmOncuP.jpg" alt="image">
                        <img  src="/storage/newimage/PDi9VYjpZBXShNmmYf6tCt2vmk8dlMM8vzTx7PMw.jpg" alt="image">
                        <img  src="/storage/newimage/1vYe12Dcv7t9rQiayU95MjjeanBA6UJeOHjXmTu3.jpg" alt="image">
                        <img  src="/storage/newimage/qYAKKPqcx3o35kakJir98t9oUiyh1UQWvQgsjd5h.jpg" alt="image">
                        <img  src="/storage/newimage/8oT90MD3Y3JLNIitsEzgCcaf8aX66tcEi3oMoMlp.jpg" alt="image">
                        <img  src="/storage/newimage/jM7ihbSXnATH9Lnimrs0Y91fL6R7eNMBFhqsJSmH.jpg" alt="image">
                    </div>
                    <div id="ground"></div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "CaruselComponent2",

    data() {
        return {
            autoRotate:true,
        }
    },
    methods:{

    },
    mounted() {
        let radius = 340;
        let imgWidth = 100;
        let imgHeight = 150;
        setTimeout(init, 300);
        let odrag = document.getElementById("drag-container");
        let ospin = document.getElementById("spin-container");
        let carousel = document.getElementById("carousel");
        let aImg = ospin.getElementsByTagName("img");
        ospin.style.width = imgWidth + "px";
        ospin.style.height = imgHeight + "px";
        let ground = document.getElementById("ground");
        ground.style.width = radius * 3 + "px";
        ground.style.height = radius * 3 + "px";

        function init() {
            for (let i = 0; i < aImg.length; i++) {
                aImg[i].style.transform =
                    "rotateY(" +
                    (i)* (360 / aImg.length) +
                    "deg)" +
                    " translateZ(" +
                    (radius) +
                    "px)";
                aImg[i].style.transition = "transform 2s";
                aImg[i].style.transitionDelay =
                    (aImg.length - i) / 4 + "s";
            }
        }
    }

}
</script>

<style scoped>
#fon{
    margin-top: 100px;
}
#carousel  {
    touch-action: none;
    display: flex;
    height: 400px;
    perspective: 1000px;
    transform-style: preserve-3d;
}
#drag-container,
#spin-container {
    position: relative;
    display: flex;
    margin: auto;
    transform-style: preserve-3d;
    transform: rotateX(-10deg);
    animation: spin 120s linear infinite;
}
#drag-container img {
    transform-style: preserve-3d;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border: 2px solid white;
    box-shadow: 0 0 10px white,0 0 10px #FFD700;
}
#drag-container :hover img{

}
#drag-container p {
    line-height: 1;
    font-size: 50px;
    font-weight: bold;
    text-align: center;
    font-family: Serif;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%) rotateX(90deg);
    color: #337AB7;
    font-family: Verdana, sans-serif;
}
#ground {
    width: 900px;
    height: 900px;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%) rotateX(90deg);
}
@keyframes spin {
    from {
        transform: rotateY(0deg);
    }
    to {
        transform: rotateY(360deg);
    }
}
@keyframes text {
    from {
        transform: rotateY(0deg);
    }
    to {
        transform: rotateY(-720deg);
    }
}
</style>

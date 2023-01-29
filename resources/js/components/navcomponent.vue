
<template >
    <div>
            <div class="adaptiv">
                <div> <router-link class=" atuin-btn2"  to="/">Главная </router-link></div>
                <div> <router-link class=" atuin-btn2"  to="/catalog">Все украшения</router-link></div>
                <div> <router-link class=" atuin-btn2"  to="/Carusel">Карусель</router-link></div>
                <div> <router-link class=" atuin-btn2"  to="/mynavbar">Мой навбар</router-link></div>
                <a class=" dropdown-toggle atuin-btn2" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Каталог
                </a>
                <div  class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <router-link  to="/GetProductByCategory/ring" class=" atuin-btn2">кольца</router-link>
                    <router-link to="/GetProductByCategory/bracelet" class=" atuin-btn2">браслеты</router-link>
                    <router-link to="/GetProductByCategory/pendant" class=" atuin-btn2">кулоны</router-link>
                </div>
            </div>
    <div>


        <div id="nav" class="container  fixed-top" >
            <div class="container-fluid">
                <div id="mynav" >
                    <router-link class="atuin-btn" to="/AboutUsButton"><span style="color:gold">Octarine_Art</span></router-link>
                    <router-link class="atuin-btn" to="/">Главная</router-link>
                    <router-link class="atuin-btn" to="/CatalogVuex">Все украшения</router-link>
                    <a class="nav-link dropdown  atuin-btn" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Украшения по категориям
                        <i class="dropdown-toggle"></i>
                    </a>
                    <div style="padding-bottom: 0;padding-top: 0;margin-left: 0" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <router-link  class="atuin-btn2" to="/GetProductByCategory/ring" style="text-decoration: none ;text-align: center">кольца</router-link>
                        <router-link  class="atuin-btn2" to="/GetProductByCategory/bracelet" style="text-decoration: none ;text-align: center">браслеты</router-link>
                        <router-link  class="atuin-btn2" to="/GetProductByCategory/pendant" style="text-decoration: none ;text-align: center">кулоны</router-link>
                    </div>
<!--                    <router-link class="atuin-btn" to="/contact">Контакты</router-link>-->
                    <router-link class="atuin-btn" to="/quickSelection">Быстрый выбор</router-link>
                    <button class="atuin-btn" v-on:click="cabinet">Кабинет</button>


                </div>
            </div>
            <div  v-if="this.$store.state.cart.length" class="nav-item" style="margin-top: -3.8rem;margin-left: 68rem">
                <router-link style="color: deeppink" class="nav-link" to="/cart"><svg  width="30" height="40" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
                </svg></router-link>
            </div>
            <div v-if="this.$store.state.cart.length>0" class="info3">{{this.$store.state.count}} </div>
            <div v-if="this.$store.state.cart.length>0" class="info4">{{this.$store.state.totalsum}}.грн</div>
        </div>
    </div>
    </div>
</template>
<script>

export default {

    name: "navcomponent",
    data() {
        return {

        }
    },
    methods:{
        cabinet(){
            window.location.href = 'cabinet';
        }
    },
    mounted() {
    },
    created() {

    },
    computed:{

    }
}
</script>

<style scoped>
.dropdown-toggle{
    position: relative;
    left: 0.5em;
}
.col2:hover .col3{
    display: block;
    position: absolute;
   padding: 0.5rem;
    left: 22rem;
    background-color: #f8f9fa;
}
.adaptiv{
    display: none;
}
@media screen and (max-width: 500px){
    .adaptiv{
        display: block ;
    }
#nav{
    display: none;
}
}
#mynav{
    height: 150px;
}
#nav{
    left: -1.6rem;
    top: -5.5rem;
}
.info3{
    width: 2rem;
    left: 60rem;
    top: 6.5rem;
}
.info4{
    width: 5rem;
    left: 63rem;
    top: 6.5rem;
}
.info3,.info4{
    position: absolute;
    height: 2rem;
    background-color: deeppink;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}
.atuin-btn {
    display: inline-flex;
    margin: 6rem -0.12rem;
    border: 0.12rem solid goldenrod;
    position: relative;
    overflow: hidden;
    font-size: 0.6rem;
    line-height: 1.25rem;
    padding: 0.75rem 1.9rem;
    color: #FFF;
    font-weight: bold;
    text-transform: uppercase;
    font-family: 'Roboto Condensed', Тahoma, sans-serif;
    background: black;
    transition: box-shadow 0.3s, transform 0.3s;
    cursor: pointer;
    text-decoration: none;
}
.atuin-btn:hover,
.atuin-btn:active,
.atuin-btn:focus {
    transform: translateY(-8px);
    box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.2), 0 1rem 1.25rem rgba(0,0,0,0.2);
    color: #FFF;
}
.atuin-btn:before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(-45deg, transparent, rgba(191, 226, 255, 0.3), transparent);
    transition: left 0.7s;
}
.atuin-btn:hover:before,
.atuin-btn:active:before,
.atuin-btn:focus:before {
    left: 100%;
}

.atuin-btn2  {
    display: grid;
    border: 0.125rem solid #BFE2FF;
    position: relative;
    overflow: hidden;
    font-size: 0.625rem;
    padding: 0.75rem 1.875rem;
    color: #FFF;
    font-weight: bold;
    text-transform: uppercase;
    font-family: 'Roboto Condensed', Тahoma, sans-serif;
    background: fuchsia;
    transition: box-shadow 0.3s, transform 0.3s;
    cursor: pointer;
}
.atuin-btn2:hover,
.atuin-btn2:active,
.atuin-btn2:focus {
    transform: translateX(8px);
    box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.2), 0 1rem 1.25rem rgba(0,0,0,0.2);
    color: #FFF;
}
.atuin-btn2:before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(-45deg, transparent, rgba(191, 226, 255, 0.3), transparent);
    transition: left 0.7s;
}
</style>

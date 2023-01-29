<template>
<div class=" main">
           <div class="messagesFromUsers container" v-for="message in this.messages" :key="message.id">
               <p>{{message.username}}</p>
               <p>{{message.email}}</p>
               <p>{{message.message}}</p>
               <p>{{message.created_at}}</p>
           </div>
    <div class="add"></div>
</div>
</template>

<script>
export default {
    name: "MessageFromUserComponent",
    data(){
        return{
            messages:[],
        }
    },
    methods:{
        //получение сообщений из базы
        getmessage:function() {
            axios.get('/getAllMessageForAboutUs').then((resp) => {
                 this.messages = resp.data;
                this.messages.forEach(function(elem) {
                    elem.created_at =String(elem.created_at.match(/\d\d\d\d-\d\d-\d\d/gm)) ;
                });
             })
        },
    },
    mounted() {
        // получение сообщений из базы
         this.getmessage();
    }
}
</script>
<style scoped>
.add{
    width: 100%;
    height: 80px;
}
.main{
    height: 100%;
    width: 100%;
}
.messagesFromUsers{
    position: relative;
    width: 700px;
    height: 200px;
    top: 4em;
    color: white;
    margin-top: 2em;
    box-shadow: rgb(218, 78, 234) 0 0 2em,white 0 0 1em ;
}
</style>

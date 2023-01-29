<template>
    <div class="main">
        <div class="info">
            <h4><img  src="/storage/newimage/phone.png" alt="phone"> Телефон: +38(068)-00-00-000</h4>
            <h4><img  src="/storage/newimage/telegram_icon.png" alt="phone"> Telegram: +38(068)-00-00-000</h4>
            <h4><img  src="/storage/newimage/viber_icon.png" alt="phone"> Viber: +38(068)-00-00-000</h4>
            <h4><img  src="/storage/newimage/whatsapp_socialnetwork_17360.png" alt="phone"> WhatsApp: +38(068)-00-00-000</h4>
            <h4>E-mail : Octarin_Art_corporation_LTD@gmail.com</h4>
            <div>
                <button v-on:click="showModalWindow" type="button" class="btn btn-primary">Написать сообщение для Octarine_Art</button>
            </div>
            <div  v-if="modalWindow" class="modWindow">
                <div style="border-radius: 10px" class="modal-dialog">
                    <div style="color: black"> {{dataNow}}</div>
                    <div class="modal-content">
                        <div class="mb-1">
                            <input style="width: 93%;margin-left: 15px;margin-top: 20px" type="text" class="form-control"  id="recipient-name" v-model="messageFrom" placeholder="Ваше имя" required>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-1">
                                    <textarea v-if="counterMessage===0" rows="5" style="margin-top: 20px" cols="7" name="newMessage"  class="form-control"  id="message-text" v-model="newMessage" placeholder="Сообщение" required></textarea>
                                    <textarea v-if="counterMessage>=1" rows="5" style="margin-top: 20px" cols="7" name="newMessage"  class="form-control" v-model="newMessage" placeholder="Склероз? Что-то забыли?" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="closeModalWindow" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button v-on:click="sendMessageFromUser"  type="button" class="btn btn-primary">Послать сообщение</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showWarning===true" class="mainWarning" v-on:click="closeWarningmessage">
            <WarningTransparensyComponent></WarningTransparensyComponent>
        </div>
    </div>

</template>

<script>
// import {mapActions} from "vuex";
import {LetterFromVizitor} from '../MyClass/LetterFromVizitor.js';
import {MyStaticClass} from '../MyClass/MyStaticClass';
export default {
    name: "contactcomponent",
    data() {
        return {
            modalWindow:false,
            newMessage:'',
            newMessage2:[],
            messageFrom:'',
            dataNow:'',
            counterMessage:0,
            showWarning:false,
        }

    },
    created() {

    },
    mounted() {
        this.dataNow=this.showdata();
       // this.GET_PRODUCTS_FROM_API();
    },
    methods:{
        // ...mapActions([
        //     'GET_PRODUCTS_FROM_API'
        // ]),
        showdata:function (){
            return new Date().toLocaleDateString();
        },
        showModalWindow:function (){
            this.modalWindow=true;
        },
        closeModalWindow:function (){
            this.modalWindow=false;
        },
        closeWarningmessage:function (){
            this.showWarning=false;
        },
        sendMessageFromUser:function (){
            if(this.newMessage.length===0 || this.messageFrom.length===0){
                this.showWarning=true;
                this.modalWindow=false;
            }
            const regex = /[А-Яа-я\d\.,?!A-Za-z\s]/gm;
            this.newMessage =this.newMessage.match(regex).join('').replace(/ +/g,' ').trim() ;
            this.messageFrom =this.messageFrom.match(regex).join('').replace(/ +/g,' ').trim() ;
            var obj=new LetterFromVizitor(this.messageFrom,this.newMessage);
            MyStaticClass.Helper('LetterFromVizitor',obj);
            this.modalWindow=false;
            this.newMessage='';
            this.counterMessage=this.counterMessage+1;
        }
    },
}
</script>

<style scoped>

.modWindow{
    position: absolute;
    top: 100px;
    left: 300px;
    height: min-content;
    width: 100vh;
    background-color:ghostwhite;
    border-radius: 10px;
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}
.info{

}
img{
    width: 1em;
    height: 1em;
}
h4{
    color: white;
}
.btn:hover{
    cursor: pointer;
}
</style>

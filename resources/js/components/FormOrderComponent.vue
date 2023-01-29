<template>
    <div class="formorder container">
        <div style="margin-top: 5em;color: white">Вы хотите оформить заказ на :</div>
        <table style="margin-top: 2em" class="table table-striped table-hover table-bordered table-success">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="el in this.finalorder">
                <td>{{el.name}}</td>
                <td>{{el.category}}</td>
                <td>{{el.defaultINcart}}</td>
                <td>{{el.defaultINcart*el.price}}</td>
            </tr>
            </tbody>
        </table>

        <div><h5 style="color: white">Общая сумма заказа : {{ this.finalprice}} гривен</h5></div>
        <div ><router-link style="color: white" class="nav-link" to="/cart">Вы можете вернуться в корзину и откорректировать заказ </router-link></div>
        <div class="card-body">
            <form @submit.prevent="order1">
                <div class="form-group row">
                    <label style="color: white" for="email" class="col-md-4 col-form-label text-md-right">E-Mail Адрес</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" v-model="email">
                    </div>
                </div>
                <div style="text-align: center; " class="alert alert-danger" v-if="errors2===true">
                    <!--                    Введите адрес вашей электронной почты-->
                    Хотя бы одно поле для контакта с Вами должно быть заполнено
                </div>
                <div class="form-group row">
                    <label style="color: white" for="username" class="col-md-4 col-form-label text-md-right">Имя</label>
                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" v-model="username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="textuser" style="color: white">Данные для отправки по почте ( Город, название почтового оператора, номер почтового отделения, фамилия, телефон )</label>
                    <textarea id="textuser" name="textuser" v-model="textuser" class="form-control" rows="5" placeholder="Введите данные для отправки по почте"></textarea>
                </div>

                <div class="form-group row">
                    <label for="phone" style="color: white;margin-left: 1rem">Или оставьте свой номер телефона, по которому с Вами свяжется наш представитель для уточнения деталей</label>
                    <label style="color: white" for="phone" class="col-md-4 col-form-label text-md-right"><img  src="/storage/newimage/phone.png"> Телефон </label>
                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control" name="phone" v-model="phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label style="color: white" for="phone2" class="col-md-4 col-form-label text-md-right"><img src="/storage/newimage/telegram_icon.png"> Telegram </label>
                    <div class="col-md-6">
                        <input id="phone2" type="text" class="form-control" name="telegram" v-model="telegram">
                    </div>
                </div>
                <div  class="form-group row">
                    <label style="color: white" for="phone3" class="col-md-4 col-form-label text-md-right"><img src="/storage/newimage/viber_icon.png"> Viber </label>
                    <div class="col-md-6">
                        <input id="phone3" type="text" class="form-control" name="viber" v-model="viber">
                    </div>
                </div>
                <div class="form-group row">
                    <label style="color: white" for="phone4" class="col-md-4 col-form-label text-md-right"><img src="/storage/newimage/whatsapp_socialnetwork_17360.png"> Whatsapp </label>
                    <div class="col-md-6">
                        <input id="phone4" type="text" class="form-control" name="whatsapp" v-model="whatsapp">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Отправить заказ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "FormOrderComponent",
    data() {
        return {
            finalorder:[],
            finalprice:'',
            email: '',
            username: '',
            phone:'',
            whatsapp:'',
            viber:'',
            telegram:'',
            errors2:false,
            textuser:''
        }
    },
    methods:{
        order1() {
            if (this.email.length===0 && this.phone.length===0 && this.whatsapp.length===0 && this.viber.length===0 && this.telegram.length===0){
                this.errors2=true;
            }
            else {
                for(let i=0;i<this.finalorder.length;i++){
                    axios.post('order',{username:this.username,email:this.email,phone:this.phone,viber:this.viber,telegram:this.telegram,whatsapp:this.whatsapp,textuser:this.textuser,
                        productname:this.finalorder[i].name,productprice:
                        this.finalorder[i].price,productquantity:this.finalorder[i].defaultINcart,category:this.finalorder[i].category
                    })
                        .then((response) => {
                                debugger;
                                this.message = response.data.message;
                                if (this.message=="New order is created"){
                                    alert("заказ на :"+" "+this.finalorder[i].name+" принят");
                                    window.location.href = "/";
                                }
                            }
                        )
                }
            }
        }
    },
    mounted() {
        this.finalorder=this.$store.state.cart;
        this.finalprice=this.$store.state.totalsum;
    },
    computed:{

    },
}
</script>

<style scoped>
img{
    width: 2rem;
    height: 2rem;
}
.formorder{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size: 100%;
    margin-top: 3em;
}
</style>

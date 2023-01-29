import axios from 'axios'
export default {
    state: {
        flagscreen:'',
        products: [],
        cart: [],
        totalsum:0,
        count:0,

        total: [],
        finalOrder: [],
        totalsum2:[],
        result:'',
    },

    getters: {
        getCartFormGetters(state){ //take parameter state
            return state.cart
        },
    },

    actions: {
        // для каталога VUEX
        GET_PRODUCTS_FROM_API({commit}) {
            return axios('/api/getAllproduct2'
                , {
                    method: "GET"
                })
                .then((products) => {
                    commit('SET_PRODUCTS_TO_STATE', products.data);
                    return products
                })
                .catch((error) => {
                    console.log(error);
                    return error
                })
        },

        TOCART(context, product) {
            context.commit('TOCART', product)
        },
        ActionFlagScreen(context,payload) {
            context.commit('MUTFlagScreen',payload)
        },
    },

    mutations: {
        // для каталога VUEX
        SET_PRODUCTS_TO_STATE(state, products) {
            return this.state.products = products
        },


        TOCART(state,product) {
            if(this.state.cart.length>0){
                let analogue=false;
                for (let i=0;i<this.state.cart.length;i++){
                    if(this.state.cart[i].id===product.id){
                        analogue=true;
                        this.state.cart[i].defaultINcart=product.defaultINcart+1;
                        this.state.totalsum=this.state.totalsum+product.price;
                        this.state.count=this.state.count+1;
                    }
                }
                if (analogue===false){
                    product.defaultINcart=product.defaultINcart+1;
                    this.state.totalsum=this.state.totalsum+product.price;
                    state.cart.push(product);
                    this.state.count=this.state.count+1;
                }
            }
            else {
                product.defaultINcart=product.defaultINcart+1;
                this.state.totalsum=this.state.totalsum+product.price;
                state.cart.push(product);
                this.state.count=this.state.count+1;
            }
        },

        MUTFlagScreen(state,payload){
            this.state.flagscreen=payload;
            return this.state.flagscreen;
        }
    }
}

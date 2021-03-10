
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import VueNumeric from 'vue-numeric';
import Vuex from 'vuex';
Vue.prototype.$user = window.User
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component('pagination', require('laravel-vue-pagination'));
import VueRouter from 'vue-router'
Vue.use(VueNumeric)
Vue.use(VueRouter)
Vue.use(Vuex)

import swal from 'sweetalert2'
window.swal = swal;
const Toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    
  });

  window.Toast = Toast;


import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '10px'
})

window.Fire = new Vue();

Vue.component('passport-clients', require('./components/passport/Clients.vue'));

Vue.component('passport-authorized-clients',   require('./components/passport/AuthorizedClients.vue')
);

Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue')
);


let routes = [





  { path: '/mulf', component: require('./components/Testusercomponent.vue')},

  { path: '/hhdgfvsbbreportbbysource', component: require('./components/Expensesreportbysource.vue')},
  { path: '/rrttggfdrepbybranh', component: require('./components/Expensesreportbydate.vue')},
  { path: '/rtrfgffghhhfftrepotrtdescat', component: require('./components/Incomereport.vue')},
  { path: '/esprejhhdrepsorced', component: require('./components/Expensesreportbybranch.vue')},
  { path: '/tghdrwerffghhfdeeghjhjhsedfred', component: require('./components/salesreport.vue')},


  




  { path: '/check', component: require('./components/Multiple.vue')},




  { path: '/checkb', component: require('./components/multiplecheckbox.vue')},
  { path: '/home', component: require('./components/CashierReal.vue')},

  { path: '/orders', component: require('./components/Ordersandpurchasesvue.vue')},

  
  { path: '/rrttggfdrepbybranhwlets', component: require('./components/ExpensesreportbyWallet.vue')},
  { path: '/ivocatrodesdocompanydecexpendicts', component: require('./components/OfficeMakeexpense.vue')},
  { path: '/shopdescashin', component: require('./components/Branchescashintransactions.vue')},
  { path: '/shopdesdecashout', component: require('./components/Branchescashouttransactions.vue')},




  { path: '/fgfdsssdsdsdebts', component: require('./components/ShopCashout.vue')}, /// admin collection center
  { path: '/settings', component: require('./components/Settingsvue.vue')},
  { path: '/resctrostravsetorics', component: require('./components/Systemsettings.vue')},
  { path: '/resctrostravsetoricsmainmenu', component: require('./components/Systemsettingsmainmenu.vue')},
  { path: '/resctrostravsetoricssubmenu', component: require('./components/Systemsettingssubmenu.vue')},

  { path: '/desgrantosrevuecoponents', component: require('./components/componentforvues.vue')},

  { path: '/vcvccvcacfdrfaddformcomponentsbbfffg', component: require('./components/formcomponents.vue')},
  { path: '/bbdhujaytykjdsjyeyhk', component: require('./components/formcomponentaccess.vue')},

  { path: '/hhdgbbsgrtywbscolectiosn', component: require('./components/ShopCash.vue')},
  { path: '/shopsedwsndmmkjsndenbalance', component: require('./components/Shopbalancing.vue')},
  { path: '/majsjdestropesilsexpd', component: require('./components/Makeexpense.vue')},
  { path: '/tyggnndsefhhgjkjgfsdddds', component: require('./components/BranchpayoutAdmin.vue')},
  { path: '/hhgsggdbremotrosrevics', component: require('./components/Branchpayout.vue')},
    { path: '/escalectonavecttros', component: require('./components/Mainmenucomponents.vue')},
    { path: '/afidewerghyttoki', component: require('./components/Submenucomponents.vue')},
    { path: '/tyredfresdedd', component: require('./components/Expensescomponent.vue')},
    { path: '/branches', component: require('./components/Branches.vue')},
    { path: '/students', component: require('./components/Studentscomponent.vue')},
    { path: '/users', component: require('./components/Users.vue')},
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/profile', component: require('./components/Profile.vue') },
    { path: '/dropdown', component: require('./components/DropdownComponent.vue') },
{ path: '/dashboard', component: require('./components/Dashboard.vue')}, 

{ path: '/desdeproducts', component: require('./components/Productsvue.vue')},
{ path: '/uryhpos', component: require('./components/Posvue.vue')},
{ path: '/destradopurchases', component: require('./components/Purchasesvue.vue')},


]
  

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
  const store = new Vuex.Store({
    state:{
      user:null
    },
    getters:{
      LOGGEDINUSER(state){
       return  state.user;
      } 
    },
    mutations:{
      SET_LOGGEDINUSER(state, payload){
        state.user = payload || null;
      }
      

    },
    actions:{

    }


})
  
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
import Container from './components/Container';
Vue.component('my-container', Container);


const app = new Vue({
    el: '#app',
    router,
    store,
    data:{
      search: ''
    },
    methods:{
searchit(){
  // console.log("searching .....")
  Fire.$emit('searching');

}
    },

});

<template>
<router-view></router-view>
   
</template>

<script>
    export default {
        props:{
            user:{
                type:Object, 
                default: ()=>null
            }
        },
        mounted() {
           
            console.log('Component mounted.')
             console.log(this.user)
             this.$store.commit('SET_LOGGEDINUSER', this.user);
        }

    }
</script>

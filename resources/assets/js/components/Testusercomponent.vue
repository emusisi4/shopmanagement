<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>
                
                <div class="card-body">

                <select v-model="select" style="margin-bottom:10px" @change="deleteUser">
                    <option value="">Select</option>
                    <option value="">Delete All</option>
                </select>

                <table>

                    <tr>
                        <th width="30%">

                            <input type="checkbox" @click="select_all_via_check_box" v-model="all_select"> 

                            <span> {{ all_select == true ? 'Uncheck All' : "Select All" }} </span>
                        </th>

                        <th width="35%">Name</th>
                        <th width="35%">Email</th>
                    </tr>

                    <tr v-for="user in users" :key="user.id">
                        <td><input type="checkbox" v-model="deleteItems" :value="`${user.id}`"></td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
              users: {},
              deleteItems: [],
              select: '',
              all_select: false
            }
        },
        methods: {
            getUser(){
                axios.get('/userlist')
                     .then((response)=>{
                       this.users = response.data.users
                     })
            },
            deleteUser() {
                axios.post('/deleteuser/'+this.deleteItems)
                     .then((response) => {
                        this.getUser()
                        this.deleteItems = []
                        this.all_select == true ? 
                             this.all_select = false : this.all_select = true;
                     })
            },
            select_all_via_check_box(){
                if(this.all_select == false){
                    this.all_select = true
                    this.users.forEach(user => {
                      this.deleteItems.push(user.id)
                    });
                }else{
                    this.all_select = false
                    this.deleteItems = []
                }
            }
        },
        created() {
            this.getUser()
        }
    }
</script> 



<template>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>COMPANY BRANCHES </b></h3>

                <div class="card-tools">
                   
                    
                    <button type="button" class="btn btn-success btn-xs" @click="newModal" >Add New Record </button>
                
                      </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>BRANCH NAME</th>
                      <th>LOCATION</th>
                      <th>CONTACT</th>
                      <th>No. OF EMPLOYEES</th>
                      <th>MODIFY</th>
                      <th>MODIFY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <tr v-for="mydataObjectinfo in mydataObject.data" :key="mydataObjectinfo.id">
                    <td>{{mydataObjectinfo.id}}</td>
                     <td>{{mydataObjectinfo.name}}</td>
                     <td>{{mydataObjectinfo.email}}</td>
                        <td>{{mydataObjectinfo.type}}</td>
                             <td>{{mydataObjectinfo.created_at  }}</td>
                               <td>{{mydataObjectinfo.updated_at}}</td>
                          <td>     
                            <a href="#">
                              <i class="btn fas fa-edit"  @click="editModal(mydataObjectinfo)"></i>
                              </a>
                               <a href="#" @click="deleteRecord(mydataObjectinfo.id)"> <i class="btn  fas fa-trash-alt"> </i></a>
                      </td>
                    </tr>
              
                    
                  </tbody>
                 <tfoot></tfoot>
                                   </table>

                
              </div>
              

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <pagination :data="mydataObject" @pagination-change-page="getResults"></pagination>
                </ul>
              </div>
              
            
              <div class="modal fade" id="addNew">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" v-show="!editmode">Add New Record</h4>
                   <h4 class="modal-title" v-show="editmode">Update Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                      
<form @submit.prevent="editmode ? updateRecord():createNewrecord()">

            <div class="modal-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                     <input v-model="form.name" type="text" name="name"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
      
                  </div>



           <div class="form-group">
                            <label>Select Country:</label>
                            <select class='form-control' v-model='country' @change='getStates()'>
                                <option value='0' >Select Country</option>
                                <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select State:</label>
                            <select class='form-control' v-model='state'>
                                <option value='0' >Select State</option>
                                <option v-for='data in states' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>



                     <div class="form-group">
                    <label for="exampleInputEmail1">Email Address </label>
                     <input v-model="form.email" type="email" name="email"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
      
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Bio Data</label>
                     <textarea v-model="form.bio" type="text" name="bio"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
      <has-error :form="form" field="bio"></has-error>
      
                  </div>
                     <div class="form-group">
                  <label>Role</label>
                  <select name ="type" v-model="form.type" id ="type" class="form-control form-control-sm" :class="{'is-invalid': form.errors.has('type')}" style="width: 100%;">
                   
                
<option value="admin"> Admin </option>
<option value="user"> Standard User </option>
<option value="author"> Author </option>
                  </select>
                
                <has-error :form="form" field="type"></has-error>
                </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                     <input v-model="form.password" type="password" name="password"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('password') }">
      <has-error :form="form" field="password"></has-error>
      
                  </div>
            </div>
            <div class="modal-footer">

  <button v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button>
            <button v-show="editmode" type="submit" class="btn btn-success btn-sm">Update</button>



                
        <button  type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>

      </div>
  </form>
          </div>
        
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            </div>
</template>

<script>
    export default {
        data(){
        return {
            editmode: false,
            mydataObject:{},
///dropdown
   country: 0,
                countries: [],
                state: 0,
                states: [],


                form: new Form({
                                    id:'',
                                    name : '',
                                    email : '',
                                    password : '',
                                    type : '',
                                    bio : '',
                                    photo : ''

            })
        }

        },
        methods:{
          ////// drpdown
            getCountries: function(){  axios.get('/get_countries').then(function (response) {this.countries = response.data; }.bind(this)); },
            getStates: function() { axios.get('/get_states',{  params: { country_id: this.country } }).then(function(response){this.states = response.data;}.bind(this));},


          /////////////////////////////////////////
// Our method to GET results from a Laravel endpoint
      getResults(page = 1) {
                        axios.get('api/branches?page=' + page)
                          .then(response => {
                            this.mydataObject = response.data;
                          });
                      },
            updateRecord(){
    this.$Progress.start();
            /// viewing from the sonsole
            ///console.log('Edidint data');
/// calling the function to update the data
this.form.put('api/branches/'+this.form.id)
  .then(()=> {
    // on success
   $('#addNew').modal('hide');
    swal.fire(
        'Update!',
        'Your file has been updated.',
        'success'
      )
      this.$Progress.finish();
    Fire.$emit('AfterAction');

  })


  .catch(()=>{
 this.$Progress.fail();
  });

            },
            editModal(mydataObject){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(mydataObject);
$('#addNew').modal('show');
            },
               newModal(){
                      this.editmode = false;
                 this.form.clear();
        this.form.reset();
$('#addNew').modal('show');
            },
            deleteRecord(id){
                swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if(result.value){
                                  this.form.delete('api/branches/'+id).then(()=>{

                                                                                swal.fire(
                                                                                  'Deleted!',
                                                                                  'Your file has been deleted.',
                                                                                  'success'
                                                                                )
                                                          Fire.$emit('AfterAction');
                                                      }).cathch(()=>{
                                                        
                                   swal.fire("Failed!", "There was Something Wrong.", "Warning");
                                                      });
    }
                     
})

            },
            loadDatarecords(){
   axios.get("api/branches").then(({ data }) => (this.mydataObject = data));
            },
            createNewrecord(){

  this.$Progress.start();
this.form.post('api/branches')
.then(()=>{


Fire.$emit('AfterAction');

$('#addNew').modal('hide');

Toast.fire({
  icon: 'success',
  title: 'Record Added Successfully'
});

  this.$Progress.finish();
})
.catch(()=>{

})




            }





        }, 
        created() {
          this.loadDatarecords();
          this.getCountries();
 Fire.$on('AfterAction', () =>{
this.loadDatarecords();
      });
        //  setInterval(() =>this.loadDatarecords(),3000);
        }
    }
</script>

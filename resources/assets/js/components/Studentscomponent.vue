<template>
     <div class="card">
              <div class="card-header">
                <h1 class="card-title">Students</h1>
                 <div class="card-tools">
                <button class="btn btn-success" @click="newModel">Add New  <i class="fa fa-user-plus fa-fw"></i></button>
               
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>NAME</th>
                      <th>P.No</th>
                      <th>CLASS</th>
                        <th>M-CONTACT</th>
                          <th>CONTACT No</th>
                      <th>CREATED</th>
                      <th>UPDATED</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                       <td>{{user.studentno}}</td>
                     <td>{{user.firstname }} {{user.middlename }} {{user.lastname}}</td>
                    <td>
                          <template v-if="user.student_section">	{{user.student_section.name}}</template>

                          </td>
                        <td>
                          <template v-if="user.student_class">	{{user.student_class.name}}</template>

                          </td>
                          <td>{{user.primarycontactname}}</td>
                            <td>{{user.primarycontact}}</td>
      <td>{{user.created_at | myDate}}</td>
        <td>{{user.updated_at}}</td>
                      <td>
         <a href="#" @click="editModel(user)"> <i class="fa fa-edit"></i></a>

           <a href="#" @click="deleteUser(user.id)"> <i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->


<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header data-entry-header">
        <h5 class="modal-title" v-show="!editmode"  id="hlabel">Add New Record</h5>
          <h5 class="modal-title" v-show="editmode" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form @submit.prevent="editmode ? updateUser():createNewrecord()">

      <div class="modal-body">
       <div class="bethapa-formheadings"> Student Bio Data</div>      
               <div class="form-group">
                <label>First Name </label>
                <input v-model="form.firstname" type="text" name="firstname" placeholder="First Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                <has-error :form="form" field="firstname"></has-error>
                </div>
              
                  
                  <div class="form-group" v-show="editmode" >
                  <label>sss Name </label>
                <input v-model="form.studentno" type="text" name="studentno" placeholder="Middle Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('studentno') }">
                <has-error :form="form" field="studentno"></has-error>
                </div>


                   <div class="form-group">
                  <label>Middle Name </label>
                <input v-model="form.middlename" type="text" name="middlename" placeholder="Middle Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('middlename') }">
                <has-error :form="form" field="middlename"></has-error>
                </div>
                <div class="form-group">
                      <label>Last Name </label>
                  <input v-model="form.lastname" type="text" name="lastname" placeholder="Last Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                <has-error :form="form" field="lastname"></has-error>
                </div>


<div class="form-group">
                  <label>Gender</label>
<select name ="gender" v-model="form.gender" id ="gender" class="form-control" :class="{'is-invalid': form.errors.has('gender')}">
<option value=""> Select Gender </option>
<option v-for='data in genders'  v-bind:key='data.id'>{{ data.name }}</option>

</select>
            <has-error :form="form" field="gender"></has-error>
            </div>

                           


                 <div class="form-group">
                       <label>Date of Birth</label>
                  <input v-model="form.dob" type="date" name="dob" placeholder="Date of Birth"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                <has-error :form="form" field="dob"></has-error>
                </div>


           

   <div class="form-group">
                       <label>Residence</label>
                  <input v-model="form.residence" type="text" name="residence" placeholder="Student Residence"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('residence') }">
                <has-error :form="form" field="residence"></has-error>
                </div>
     <div class="bethapa-formheadings"> Contact Details</div>             
    <div class="form-group">
                       <label>Main Contact Person</label>
                  <input v-model="form.primarycontactperson" type="text" name="primarycontactperson" placeholder="Primary Contact Person"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('primarycontactperson') }">
                <has-error :form="form" field="primarycontactperson"></has-error>
                </div>

    <div class="form-group">
                       <label>Main Contact Number</label>
                  <input v-model="form.primarycontact" type="text" name="primarycontact" placeholder="Primary Contact Number"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('primarycontact') }">
                <has-error :form="form" field="primarycontact"></has-error>
                </div>


<div class="form-group">
                       <label>Fathers Name</label>
                  <input v-model="form.fathername" type="text" name="fathername" placeholder="Fathers Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('fathername') }">
                <has-error :form="form" field="fathername"></has-error>
                </div>


                <div class="form-group">
                       <label>Father Contact</label>
                  <input v-model="form.fatherscontact" type="text" name="fatherscontact" placeholder="Fathers Contact"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('fatherscontact') }">
                <has-error :form="form" field="fatherscontact"></has-error>
                </div>


                <div class="form-group">
                       <label>Father's Occupation</label>
                  <input v-model="form.fathersoccupation" type="text" name="fathersoccupation" placeholder="Fathers Occupation"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('fathersoccupation') }">
                <has-error :form="form" field="fathersoccupation"></has-error>
                </div>

    <div class="form-group">
                       <label>Mother's Name</label>
                  <input v-model="form.mothersname" type="text" name="mothersname" placeholder="Mothers Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('mothersname') }">
                <has-error :form="form" field="mothersname"></has-error>
                </div>

  <div class="form-group">
                       <label>Mother's Contact</label>
                  <input v-model="form.motherscontact" type="text" name="motherscontact" placeholder="Mothers Contact"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('motherscontact') }">
                <has-error :form="form" field="motherscontact"></has-error>
                </div>

 <div class="form-group">
                       <label>Mother's Occupation</label>
                  <input v-model="form.mothersoccupation" type="text" name="mothersoccupation" placeholder="Mothers Occupation"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('mothersoccupation') }">
                <has-error :form="form" field="mothersoccupation"></has-error>
                </div>


<div class="form-group">
                       <label>Next of Kin</label>
                  <input v-model="form.nok" type="text" name="nok" placeholder="N.O.K"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('nok') }">
                <has-error :form="form" field="nok"></has-error>
                </div>

                <div class="form-group">
                       <label>N.O.K's Contact</label>
                  <input v-model="form.nokcontact" type="text" name="nokcontact" placeholder="Mothers Contact"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('nokcontact') }">
                <has-error :form="form" field="nokcontact"></has-error>
                </div>


                       <div class="bethapa-formheadings"> Enrollement Details</div> 
                       <div class="form-group">
                       <label>Fees Payment Number</label>
                  <input v-model="form.feespaymentno" type="text" name="feespaymentno" placeholder="Payment Number"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('feespaymentno') }">
                <has-error :form="form" field="feespaymentno"></has-error>
                </div>
 
 
<div class="form-group">
                  <label>Class Enrolled</label>
<select name ="studentclassenrolled" v-model="form.studentclassenrolled" id ="studentclassenrolled" class="form-control" :class="{'is-invalid': form.errors.has('studentclassenrolled')}">
<option value=""> ------ Select Class  ------ </option>
<option v-for='data in studentclasses' v-bind:value='data.classno'>{{ data.name }}</option>

</select>
            <has-error :form="form" field="studentclassenrolled"></has-error>
            </div>

<div class="form-group">
                  <label>Section</label>
<select name ="ssection" v-model="form.ssection" id ="ssection" class="form-control" :class="{'is-invalid': form.errors.has('ssection')}">
<option value=""> ------ Select Class  ------ </option>
<option v-for='data in schoolsections' v-bind:value='data.id'>{{ data.name }}</option>

</select>
            <has-error :form="form" field="schoolsections"></has-error>
            </div>

 

          


                    <div class="form-group">
                       <label>Former School</label>
                  <input v-model="form.formerschool" type="text" name="formerschool" placeholder="Former School"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('formerschool') }">
                <has-error :form="form" field="formerschool"></has-error>
                </div>
              
                  <div class="form-group">
                       <label>Entry Date</label>
                  <input v-model="form.doe" type="date" name="doe"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('doe') }">
                <has-error :form="form" field="doe"></has-error>
      
                </div>

           <div class="bethapa-formheadings"> Health Status</div>      
              
               <div class="form-group">
                  <label>Any Choronic Desease??</label>
<select name ="deasesatatus" v-model="form.deasesatatus" id ="deasesatatus" class="form-control" :class="{'is-invalid': form.errors.has('deasesatatus')}">
<option value=""> Select Disease </option>
<option v-for='data in yesandnooptions'  v-bind:value='data.id'>{{ data.name }}</option>

</select>   
               <has-error :form="form" field="deasesatatus"></has-error>
            </div>    



  <div class="form-group">
                <label>Health Description </label>
                <input v-model="form.healthdescrition" type="text" name="healthdescrition" placeholder="Health Description"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('healthdescrition') }">
                <has-error :form="form" field="healthdescrition"></has-error>
                </div>

       <has-error :form="form" field="deasesatatus"></has-error>
              
              
           </div>




      <div class="modal-footer data-entry-footer">
            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>


</form>
    </div>
  </div>
</div>










              
            </div>





    
</template>

<script>
    export default {
        data(){
 
return{
  // checking if the edit mode is true  display the edit function
  editmode: false,
  /// for populating the the selectboexs
  countries:{},
  schoolsections:{},
  genders:{},
  studentclasses:{},
  yesandnooptions:{},
  
  /////////////////////////////////////// End of populating select boxes
   users : {},
    form: new Form({
        id:'',
        firstname : '',
        middlename : '',
        lastname : '',
        dob : '',
        gender : '',
        primarycontact : '',
        nok : '',
        nokcontact : '',
        primarycontactperson : '',
        ssection : '',
        fathername : '',
        fatherscontact : '',
        fathersoccupation : '',
        mothersname : '',
        motherscontact : '',
        mothersoccupation :'',
        feespaymentno : '',
        formerschool : '',
        doe : '',
        deasesatatus :'',
        studentclassenrolled : '',
        healthdescrition : '',
        residence : '',

             


    })
}
        },
        methods:{

/////////////////////////////////



   




          updateUser(){
            this.$Progress.start();
            /// viewing from the sonsole
            ///console.log('Edidint data');
/// calling the function to update the data
this.form.put('api/student/'+this.form.id)
  .then(()=> {
    // on success
   $('#addNew').modal('hide');
    Swal.fire(
        'Update!',
        'Your file has been updated.',
        'success'
      )
      this.$Progress.finish();
    Fire.$emit('AfterCreate');  

  })
        
    
  .catch(()=>{
 this.$Progress.fail();
  });


          },
          newModel(){
             this.editmode = false;
            this.form.reset();
                      $('#addNew').modal('show');
          },
            editModel(user){
              this.editmode = true;
                      this.form.reset();
                      $('#addNew').modal('show');
                       this.form.fill(user);
          },
          deleteUser(id){
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    /// Send reuest to the server
                     if (result.value) {
                                  this.form.delete('api/student/'+id).then(()=>{
                                                    
                                                                                Swal.fire(
                                                                                  'Deleted!',
                                                                                  'Your file has been deleted.',
                                                                                  'success'
                                                                                )
                                                          Fire.$emit('AfterCreate');                    
                                                      }).cathch(()=>{
                                  Swal("Failed!", "There was Something Wrong.", "Warning");
                                                      });
                     }
                    
                  })
          },
          loadUsers(){
//// getting the users data from the indexmethod of the controller
/// we are storing the data in the users onject under the DATA
axios.get("api/student").then(({ data }) => (this.users = data));
axios.get("api/getCountries").then(({ data }) => (this.countries = data));

    axios.get("api/getyesandnooptions").then(({ data }) => (this.yesandnooptions = data));
    axios.get("api/getGenders").then(({ data }) => (this.genders = data));
  axios.get("api/getstudendClasses").then(({ data }) => (this.studentclasses = data));
  axios.get("api/getSections").then(({ data }) => (this.schoolsections = data));
          },

     loadPop(){
//// getting the users data from the indexmethod of the controller
/// we are storing the data in the users onject under the DATA


          },


          createNewrecord(){
            /// callng the progress bar to start
              this.$Progress.start();
            ///sending an http reuest to the serve
              this.form.post('api/student') ///sending data to the UserApi
              /// if successsful
              .then(()=>{
  ///checking if the success is done
////// Creating an event to be called after adding  user
/// calling the fire action event. EMIT CREATES THE EVENT
Fire.$emit('AfterCreate');
              /// hiding the modal
              $('#addNew').modal('hide')
              toast.fire({
                        icon: 'success',
                        title: 'Record Successfully Added'
                      })
        /// ending the progress bar
         this.$Progress.finish();
              })
              /// if unsuccessful
              .catch(()=>{

              })
            
          }

        },

        created() {
           this.loadUsers();
           ///listenning to the AfterCreate event to load a function once a call comes in
           Fire.$on('AfterCreate', () =>{
this.loadUsers();
           });
         // setInterval(() =>this.loadUsers(),3000);
        }
    }
</script>

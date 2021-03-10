<style scoped>
#top-brand {

    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 0.5px solid #ffffff7a;
}

#top-menu {
    height:30px;
}

#main-container {
    height: 100vh;
}


/*-- SIDE MENU --*/

#sidebar {

    color: #fff;
    transition: all 0.3s;
    max-width: 250px;
}
#sidebar.active{
    max-width: 250px;
	margin-left: -240px;
}

#sidebar .sidebar-header{
    padding: 5.5px;
    text-align: left;
    font-size: 0.8em;
    padding-left: 40px;

}
#sidebar ul.components{
	padding: 20px 0px;

}

#sidebar ul p{
	padding: 10px;
	font-size: 1.1em;
	display: block;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 0.9em;
    padding-left: 40px;
    display: block;
    color: lightgray;
    border-bottom: 0.2px solid lightgray;
}


#sidebar ul li a:hover {
    color: var(--inno-light-gray);
    background: var(--inno-medium-blue);
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: var();
}
a[data-toggle="collapse"] {
    position: relative;
}
.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}
a.download{
	background: #fff;
	color: #7386D5;
}
a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

@media(maz-width:768px){
	#sidebar{margin-left: -250px;}
	#sidebar.active{
		margin-left: 0px;
	}
	#sidebarCollapse span{
		display: none;
	}
}


div#side-nav {
    max-width: 250px;
}

#inno-logo img {
    max-width: 130px;
    margin:auto;

}

#inno-logo {
    max-width: 250px;
}

.top-icon {
    color: white;
    background: #3c439f;
    padding: 5px;
    border-radius: 10px;
    font-size: 0.75em;
}

.admin-details {
    float: right;
    padding-right: 30px;
}

.bethapa-table-header {
    font-weight: bold;
    color: black;
    font-size: 0.9em;
    border-bottom: 1px solid black;
    margin-bottom: 20px;
    width: 100%;
}

.admin-name {
    color: white;
    font-size: 0.7em;
    font-weight: bold;
    padding-top: 10px;
}


/*--TOP NAVIGATION --*/

.top-nav {
    padding: 0px;
    padding-bottom: 5px;
    height: 30px;
    line-height: 1;
    background: none;
}

a.nav-link {
    color: white !important;
    font-size: 0.7em;
    font-weight: 600;
    border-right: 0.5px solid white;
    width: 110px;
    text-align: center;
    /* margin-left: 15px; */
}

img#bgr {
    position: absolute;
    right: 0px;
}
img#bgl {
    position: absolute;
}





@media screen and (min-width: 480px) {
    #sidebar.active{
        max-width: 100px;
        margin-left: 0px;
    }


    .lg-hide {
        display: none;
    }


    .lg-unhide {
        display: initial;
    }
    }


/*--- MAIN CONTENT AREA ---- */

.inno-bread {
    background: #ffffffcf;
    padding: 3px;
    font-size: 0.7em;
    line-height: 2em;

}


button#sidebarCollapse {
    background: none;
    color: #2b2d72;
    padding-left:10px !important;
    padding: 0px;
    border: none;
    margin-right: 5px;
    width: 10p;
}


.front-sec {

    background: white;
    margin: 10px;
}


.dash-title {
    font-size: 0.75em;
    font-weight: bold;
    padding-bottom: 0px;
    margin-bottom: 0px;
    /* line-height: 1em; */
}

.dash-sub-tittle {
    font-size: 0.8em;
    color: white;
    padding: 3px;
    margin-bottom: 0px;
}

.sub-perf {

    background:white;
    margin: 3px;
    padding: 3px;
    font-size: 0.8em;
    font-weight: bold;
    padding-left: 5px;
    border: 0.5px solid gray;
}


.performers > div:nth-child(odd) {
    background: #d3d3d342;
  }

  .performers > div:nth-child(1) {
   
        color: #212567;
    font-size: 25px;
        font-weight: bold;
}
  



.performers {
    display: flex;
    flex-direction: column;
    width:100%
}

.perf-section {
    flex-direction: row;
    display: flex;
    width: 100%;
}
tr:nth-child(even) {
  background-color: #96af9c;
  font-size: 20px;
}
tr:nth-child(odd) {
  background-color: #d1dbb9;
 font-size: 20px;
 
}
th {
  background-color: #8c9765;
  font-size: 23px;
}
</style>

<template>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Sales Report - By Branch</b></h3>

                <div class="card-tools" v-if="info > 0">
                   
                
                    <button type="button" class="btn btn-success btn-xs" @click="newModal" >Add New Record </button>
                
                      </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
            
                <hr>
               <form @submit.prevent="createNewrecord()">
                 
                      <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                     <input v-model="form.startdate" type="date" name="startdate"
        class="form-control-sm" :class="{ 'is-invalid': form.errors.has('startdate') }">
      <has-error :form="form" field="startdate"></has-error>
 <label for="exampleInputEmail1">End Date</label>
                     <input v-model="form.enddate" type="date" name="enddate"
        class="form-control-sm" :class="{ 'is-invalid': form.errors.has('enddate') }">
      <has-error :form="form" field="enddate"></has-error>

      
                  <label>Branch</label>
                    <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEvent"  class="form-control-sm"  :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value="900"> All Branches  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtn" class="btn btn-primary btn-sm">Saveit</button>

                                <has-error :form="form" field="branchnametobalance"></has-error>



                                
                     
       
       
                   
          </div>

                </form>








<div>

  
     <div class="col container-fluid dblock container-fluid front-sec ml-0 px-0">    
                      
                <div class="perf-section"> 
                      <div class="performers">
                                <div class="">  </div>
                                    <div class="bethapa-table-header"></div>
                                <table  style="width:98%">
                  <thead>
                    <tr>
                   
                      <th colspan='5'> Soccer </th>
                       <th colspan='1'>  </th>
                      <th colspan='1'>  </th>
                      <th colspan='4'></th>
                    
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                        <td> Sales</td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                        <td> SSP {{ formatPrice(rangetotalcollection) }} </td>
                         </tr>

                          <tr>
                        <td> Payout</td>
                         <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                       <td> SSP {{ formatPrice(rangetotalcredits) }} </td>
                         </tr>
                               
                        <tr>
                        <td> </td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                    <td>  </td>
                         </tr>

                  </tbody>
                    <tfoot>   
                     <th colspan='3'>  
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center >Line Profit </span></span></th>
                 <th>    
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > SSP {{ formatPrice(rangetotalcollection-rangetotalexpenses-rangetotalcredits) }}  </span></span>    </th>  
                     <th colspan='4'>  </th>  
                     
                       </tfoot>
                    </table>
                                   
                            </div>
                   <div class="performers">
                                <div class="">  </div>
                                    <div class="bethapa-table-header"></div>
                                <table  style="width:98%">
                  <thead>
                    <tr>
                   
                      <th colspan='5'> Virtual </th>
                       <th colspan='1'>  </th>
                      <th colspan='1'>  </th>
                      <th colspan='4'></th>
                    
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                        <td> Sales</td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                        <td> SSP {{ formatPrice(rangetotalcollection) }} </td>
                         </tr>

                          <tr>
                        <td> Payout</td>
                         <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                       <td> SSP {{ formatPrice(rangetotalcredits) }} </td>
                         </tr>
                               
                     

                  </tbody>
                    <tfoot>   
                     <th colspan='3'>  
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > Line Profit </span></span></th>
                 <th>    
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > SSP {{ formatPrice(rangetotalcollection-rangetotalexpenses-rangetotalcredits) }}  </span></span>    </th>  
                     <th colspan='4'>  </th>  
                     
                       </tfoot>
                    </table>
                                   
                            </div>
                      
                      
                      
                      
                           <div class="performers">
                                <div class="">  </div>
                                    <div class="bethapa-table-header"></div>
                                <table  style="width:98%">
                  <thead>
                    <tr>
                   
                      <th colspan='5'> Online </th>
                       <th colspan='1'>  </th>
                      <th colspan='1'>  </th>
                      <th colspan='4'></th>
                    
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                        <td> Deposits</td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                        <td> SSP {{ formatPrice(rangetotalcollection) }} </td>
                         </tr>

                          <tr>
                        <td> Withdraws</td>
                         <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                       <td> SSP {{ formatPrice(rangetotalcredits) }} </td>
                         </tr>
                               
                        <tr>
                        <td> </td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                    <td>  </td>
                         </tr>

                  </tbody>
                    <tfoot>   
                     <th colspan='3'>  
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > Line retantion </span></span></th>
                 <th>    
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > SSP {{ formatPrice(rangetotalcollection-rangetotalexpenses-rangetotalcredits) }}  </span></span>    </th>  
                     <th colspan='4'>  </th>  
                     
                       </tfoot>
                    </table>
                                   
                            </div>
                     
                     
                      <div class="performers">
                                <div class="">  </div>
                                    <div class="bethapa-table-header"></div>
                                <table  style="width:98%">
                  <thead>
                    <tr>
                   
                      <th colspan='5'> Summary </th>
                       <th colspan='1'>  </th>
                      <th colspan='1'>  </th>
                      <th colspan='4'></th>
                    
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                        <td> Total Sales</td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                        <td> SSP {{ formatPrice(rangetotalcollection) }} </td>
                         </tr>

                          <tr>
                        <td> TOTAL CREDITS</td>
                         <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                       <td> SSP {{ formatPrice(rangetotalcredits) }} </td>
                         </tr>
                               
                        <tr>
                        <td> TOTAL EXPENSES</td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                    <td> SSP {{ formatPrice(rangetotalexpenses) }} </td>
                         </tr>

                  </tbody>
                    <tfoot>   
                     <th colspan='3'>  
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > NET INCOME </span></span></th>
                 <th>    
                    <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center > SSP {{ formatPrice(rangetotalcollection-rangetotalexpenses-rangetotalcredits) }}  </span></span>    </th>  
                     <th colspan='4'>  </th>  
                     
                       </tfoot>
                    </table>
                                   
                            </div>
                           
                            </div>
                    </div>
            


</div>




























































                
              </div>
              

          
              
            
        
            </div>
</template>

<script>
    export default {
        data(){
          
        return {
          rangetotalcollection: null,
          rangetotalexpenses: null,
          rangetotalcredits: null,
           info: null,
            editmode: false,
            mydataObject:{},
            mycredits:{},
            expenseslist:{},
              brancheslist:{},
                  walletlist:{},
                   collections:{},
            addnewrecordstatus:{},
///dropdown
   country: 0,
                countries: [],
                state: 0,
                states: [],
        expensetypes : '',
        expensecategory : '',

                form: new Form({
                                    id:'',
                                    expense : '',
                                    description : '',
                                    amount : '',
                                    datemade : '',
                                    branch : ''
                                  

            })
        }

        },
        methods:{
           watch: {
    price: function(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.price = result);
    }
  },
   myClickEvent($event) { const elem = this.$refs.myBtn
            elem.click()
        },
          ///
            formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
          ////// drpdown
            getCountries: function(){ axios.get('/get_countries').then(function (response) {this.countries = response.data;  }.bind(this));      },
            getStates: function() {axios.get('/get_states',{
                    params: {
                        country_id: this.country
                    }
                }).then(function(response){
                    this.states = response.data;
                }.bind(this));
            },


          /////////////////////////////////////////
// Our method to GET results from a Laravel endpoint
      getResults(page = 1) {
                        axios.get('api/makeexpense?page=' + page)
                          .then(response => {
                            this.mydataObject = response.data;
                          });
                      },
            updateRecord(){
    this.$Progress.start();
            /// viewing from the sonsole
            ///console.log('Edidint data');
/// calling the function to update the data
this.form.put('api/makeexpense/'+this.form.id)
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
                                  this.form.delete('api/makeexpense/'+id).then(()=>{

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
           checkAccess(){
               //  axios.get("api/getMakeexpense").then(({ data }) => (this.info = data));
                   axios.get("api/getrantetotalcollection").then(({ data }) => (this.rangetotalcollection = data));

           },
            loadDatarecords(){


                


                           axios.get("api/getincomereport").then(({ data }) => (this.mydataObject = data));
                           axios.get("api/getincomereportforcredits").then(({ data }) => (this.mycredits = data));
                                               
                           axios.get("api/getBranches").then(({ data }) => (this.brancheslist = data));
                         
                           axios.get("api/getrantetotalcollection").then(({ data }) => (this.rangetotalcollection = data));
                              axios.get("api/getrantetotalcredits").then(({ data }) => (this.rangetotalcredits = data));
                                 axios.get("api/getrantetotalexpenses").then(({ data }) => (this.rangetotalexpenses = data));

        //console.log(response.data););
            },
            createNewrecord(){

                                this.$Progress.start();
                                this.form.post('api/recordtoincomeviewreport')
                                .then(()=>{


                                Fire.$emit('AfterAction');

                               // $('#addNew').modal('hide');

                                Toast.fire({
                                icon: 'success',
                                title: 'Record Added Successfully'
                                });

                                this.$Progress.finish();
                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })




            }





        }, 




        created() {
          this.loadDatarecords();
          this.getCountries(); Fire.$on('AfterAction', () =>{
this.loadDatarecords();
      });
        //  setInterval(() =>this.loadDatarecords(),3000);
         setInterval(() =>this.checkAccess(),30000);
        }
    }
</script>

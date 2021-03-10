<style scoped>
.odds-bg {
    display: block;
    background: gray;
    padding: 2px 2px;
    border: 1px solid;
    border-color: var(--table-header-bg);
}


</style>

<template>

     <div>
             

  <section class="content">
      <div class="container-fluid">
        <div class="row">
      
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Pre-Match Games</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">LIVE GAMES</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Hot Keys</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                
                 
                    <div class="post clearfix">
                            <div class="card-body table-responsive p-0">








































                          
                           
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>  DATE</th>
                      <th>MATCH</th>
                      <th>RESULT(1X2)</th>
                       <th>DRAW NO BET</th>
                      <th>DOUBLE CHANCE</th>
                     
                    <th> UNDER / OVER </th>
                    
                   
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <tr v-for="mydataObjectinfo in mydataObject.data" :key="mydataObjectinfo.id">
                    <td>{{mydataObjectinfo.id}}</td>
                  
                    <td  class="bold-events-titles live-table">{{mydataObjectinfo.datemade}}</td>
                           <td> {{mydataObjectinfo.id}}  <br> <template v-if="mydataObjectinfo.branch_name">	{{mydataObjectinfo.branch_name.branchname}}</template></td>
                           <td>    <template v-if="mydataObjectinfo.expense_name">	{{mydataObjectinfo.expense_name.expensename}}</template></td>
                          <td>{{mydataObjectinfo.description}}</td>
                       
                               <td> <div class="odds-bg"> {{ formatPrice((mydataObjectinfo.amount))}}</div></td>
                               <td>   <div v-if="((mydataObjectinfo.explevel)) == 1">
                                <span class="cell" style="color:#dc3545 ;">  
   
                    <span style="font-size:1.0em;" center >  Branch </span></span>
                              </div>
                               <div v-if="((mydataObjectinfo.explevel)) == 2">
                                <span class="cell" style="color:#1591a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Office </span></span>
                              </div> 
                              
                              </td>

   <td>   <div v-if="((mydataObjectinfo.walletexpense)) == 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  Collections </span></span>
                              </div>
                               <div v-if="((mydataObjectinfo.walletexpense)) == 2">
                                <span class="cell" style="color:#1591a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Investment </span></span>
                              </div>
                              
                                 <div v-if="((mydataObjectinfo.walletexpense)) == 4">
                                <span class="cell" style="color:#1578a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Branch </span></span>
                              </div>
                              
                               </td>

                               
                          <td>     
                            <a href="#" v-if="info > 0">
                              <button type="button"   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editModal(mydataObjectinfo)"> Edit</button>
                              </a>
                               <a href="#">
                                   <button type="button" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteRecord(mydataObjectinfo.id)"> Del </button></a>
                      </td>
                    </tr>
              
                    
                  </tbody>
               
                                   </table>

                
              </div>
              

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <pagination :data="mydataObject" @pagination-change-page="getResults"></pagination>
                </ul>
              </div>
                    </div>
                   
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>









    <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                    <div class="card-header bet-check-header">
                            FAST BET
                          
                          </div>
                          <div class="card-body bet-check-body">
                          <input type="" class="right-inputs" placeholder="Game ID">   <input type="" class="right-inputs" placeholder="Bet Option">
                          <button type="submit" hidden="" class="right-submit"> GO </button>
      
                          </div>
              <div class="card bet-check bet-slip">

                
    <div class="card-header bet-check-header">
      BET SLIP
    </div>

    <div class="populated-slip-main">
     
        <div class="populated-slip">     

            <div id="slip-page">
        
                <div id="top" class="cuts"> 
                    <div id="logo" class="cuts"> <img src="images/nsb-logo.png"> </div>
                    <div id="website" class="cuts"> <div> <p>BET ONLINE:  </p> <p>NetBet.ug     </p>   </div> </div>
                </div>
        
                <div id="info" class="cuts"> 
                    <table id="top-info">
                        <tbody>
        
                                <tr>
                                        <td colspan="1"><p>CALL: </p> <p> 0782947474 </p></td>
                                        <td colspan="2"> <p> Email: </p> <p> support@netbet.ug  </p></td>
                                       
                                 </tr>
        
                            
                                        <tr class="branch">
                                                <td colspan="3"><p>BRANCH: </p> <p> KIREKA </p></td>
                                         </tr>
        
                                         <tr class="branch">
                                                <td colspan="3"><p>CASHIER:</p> <p> NALUWU PHIONA </p></td>
                                         </tr>
        
                                         <tr class="branch">
                                                <td colspan="3"><p>DATE:</p> <p> 12 MAY 2019 10:22 </p></td>
                                         </tr>
        
                               
        
        
                                 <tr>
                                        <td colspan="1"><p>Order No: </p> <p> 234223 </p></td>
                                        <td colspan="2"> <p> Serial No: </p> <p> 34242424243424 </p></td>
                                       
                                 </tr>
        
        
                        </tbody>
        
                    </table>
                </div>
                <div id="selections" class="cuts">
        
                    <table class="tselections">
                    
                        <tr class="single">
                                <td rowspan="2" class="game-number">13930</td>
                                <td>African Cup of Nations</td> 
                                  
                        
                        </tr>
                        <tr>
                                <td>Arsenal FC Vs Chelsea FC</td>  
                        </tr>
        
                        <tr>
                                <td rowspan="2" class="selection-div" > <div class="selection-number"> 1</div></td>
                                <td  >20/10/2019 20:30</td>
                             
                        </tr>
        
                        <tr>
                                <td> <div class="markets">FT 1x2: 2</div><div class="markets odds"> 2.32</div></td>
                        </tr>
                    </table>
        
                    <table class="tselections">
                    
                            <tr class="single">
                                    <td rowspan="2" class="game-number">13930</td>
                                    <td>African Cup of Nations</td> 
                                      
                            
                            </tr>
                            <tr>
                                    <td>Arsenal FC Vs Chelsea FC</td>  
                            </tr>
            
                            <tr>
                                    <td rowspan="2" class="selection-div" > <div class="selection-number"> 2 </div></td>
                                    <td  >20/10/2019 20:30</td>
                                 
                            </tr>
            
                            <tr>
                                    <td> <div class="markets">FT 1x2: 2</div><div class="markets odds"> 2.32</div></td>
                            </tr>
                        </table>
        
                        
                        <table class="tselections">
                    
                                <tr class="single">
                                        <td rowspan="2" class="game-number">13930</td>
                                        <td>African Cup of Nations</td> 
                                          
                                
                                </tr>
                                <tr>
                                        <td>Arsenal FC Vs Chelsea FC</td>  
                                </tr>
                
                                <tr>
                                        <td rowspan="2" class="selection-div" > <div class="selection-number"> 3 </div></td>
                                        <td  >20/10/2019 20:30</td>
                                     
                                </tr>
                
                                <tr>
                                        <td> <div class="markets">FT 1x2: 2</div><div class="markets odds"> 2.32</div></td>
                                </tr>
                            </table>
        
                            
                            <table class="tselections">
                    
                                    <tr class="single">
                                            <td rowspan="2" class="game-number">13930</td>
                                            <td>African Cup of Nations</td> 
                                              
                                    
                                    </tr>
                                    <tr>
                                            <td>Arsenal FC Vs Chelsea FC</td>  
                                    </tr>
                    
                                    <tr>
                                            <td rowspan="2" class="selection-div" > <div class="selection-number"> 4 </div></td>
                                            <td  >20/10/2019 20:30</td>
                                         
                                    </tr>
                    
                                    <tr>
                                            <td> <div class="markets">FT 1x2: 2</div><div class="markets odds"> 2.32</div></td>
                                    </tr>
                                </table>
                    
                </div>
             
        
                <div id="totals">
                    <table id="t-totals">
                        <tr id="total-titles">
                            <td colspan="3"> </td>
                            <td > Odds </td>
                            <td > Stake </td>
                            <td colspan="2" class="right">Payout</td>
                        </tr>
        
        
                        <tr>
                                <td colspan="3"> Accum 10 of 10</td>
                                <td > 5.44 </td>
                                <td > 10000 </td>
                                <td colspan="2" class="right"> 544,000</td>
                            </tr>
            
                    </table>
        
        
                    <table class="calculations bold-bottom" id="cal-top">
        
                            <tr>  
                                <td> Total Stake </td>
                                <td class="right">  <span>UGX</span> 45,000,000 </td>
            
                            </tr>
            
            
            
            
                        </table>
        
        
        
                    <table class="calculations">
        
                        <tr>  
                            <td>  Max. Payout </td>
                            <td class="right">  <span>UGX</span> 45,000,000 </td>
        
                        </tr>
        
        
        
        
                    </table>
        
        
                    <table class="calculations">
        
                            <tr>  
                                <td>  Tax (-15%) </td>
                                <td class="right">  <span>UGX</span> 234,000 </td>
            
                            </tr>
            
            
            
            
                        </table>
        
        
                        <table class="calculations">
        
                                <tr>  
                                    <td>  Bonus (+15%) </td>
                                    <td class="right">  <span>UGX</span> 234,000 </td>
                
                                </tr>
                
                
                
                
                            </table>
        
        
                            <table class="calculations bold-bottom">
        
                                    <tr>  
                                        <td>  Net Payout </td>
                                        <td class="right">  <span>UGX</span> 45,000,000 </td>
                    
                                    </tr>
                    
                    
                    
                    
                                </table>
        
        
        
        
        
        
        
        
        
        
                </div>
        
               

                <div class="bet-totals">
                  <p class="stake-amt">STAKE AMOUNT :</p><input type="" class="stake-input" label="STAKE" placeholder"Enter Amount">
                  <button class="bet-btn-place"> PLACE BET </button>
                  <button class="bet-btn-clear"> CLEAR SLIP </button>
                  <button class="bet-btn-book"> BOOK BET </button>


                </div>
                
                <div id="tandcs"> 
                    ALL BETS ARE SUBJECT TO NETBET SPORT BETTING RULES
                    
                
            </div>


            </div>
        
        
        
          </div>
        






    </div>



</div>  

                

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

       
            <!-- /.card -->
          </div>













          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>






              <!-- /.card-header -->
       
              
            
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
                  <label>Expense Name</label>
<select name ="expense" v-model="form.expense" id ="expense" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('expense')}">
<option value=" ">  </option>
<option v-for='data in expenseslist' v-bind:value='data.expenseno'>{{ data.expenseno }} - {{ data.expensename }}</option>

</select>
            <has-error :form="form" field="expense"></has-error>
            </div>


<div class="form-group">
                  <label>Branch</label>
<select name ="branch" v-model="form.branch" id ="branch" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('branch')}">
<option value=" ">  </option>
<option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branch"></has-error>
            </div>




   <div class="form-group">

     <label>Amount</label>
                     <input v-model="form.amount" type="number" name="amount"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
 

     </div>  





      <div class="form-group">

     <label>Date of Expense</label>
                     <input v-model="form.datemade" type="date" name="datemade"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('datemade') }">
      <has-error :form="form" field="datemade"></has-error>
 

     </div>          
            <div class="form-group">
                  <label>Expense Wallet</label>
                  <select name ="walletexpense" v-model="form.walletexpense" id ="walletexpense" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('walletexpense')}">
                  <option value=" ">  </option>
                  <option v-for='data in walletlist' v-bind:value='data.id'>{{ data.id }} - {{ data.name }}</option>

                  </select>
            <has-error :form="form" field="walletexpense"></has-error>
            </div>




   <div class="form-group">
                       <label>Description</label>
                <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>
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
          dailyexpensestotal: null,
           info: null,
            editmode: false,
            mydataObject:{},
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
                 axios.get("api/getMakeexpense").then(({ data }) => (this.info = data));
                   axios.get("api/getdailytotalexpenses").then(({ data }) => (this.dailyexpensestotal = data));

           },
            loadDatarecords(){
                                 axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.mydataObject = data));
                                 
                               axios.get("api/getExpensestomake").then(({ data }) => (this.expenseslist = data));
                               
                               axios.get("api/getBranches").then(({ data }) => (this.brancheslist = data));
                               axios.get("api/getWalletlist").then(({ data }) => (this.walletlist = data));
                             // axios.get("api/getMakeexpense").then(({ data }) => (this.addnewrecordstatus = data));
                              //  axios.get("api/getExpensecategories").then(({ data }) => (this.expensecategory = data));
                     //     axios.get("api/getMakeexpense").then(response => (this.info = response));
                           axios.get("api/getMakeexpense").then(({ data }) => (this.info = data));
                            axios.get("api/getdailytotalexpenses").then(({ data }) => (this.dailyexpensestotal = data));

        //console.log(response.data););
            },
            createNewrecord(){

                                this.$Progress.start();
                                this.form.post('api/makeexpenseofficeuser')
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

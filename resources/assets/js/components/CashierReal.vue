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
             
  

     
    
<!-- PAGE MAIN CONTENT -->
<div class="card live-events">
    <div class="card-header live-events-header">
        LIVE NOW <sup> <span class="badge badge-light notif-badge">14</span> </sup>
    </div>
    <div class="card-body table-body">
      <div class="table-sport-type"> SOCCER </div>
      
      <table cellspacing="5" class="events-table">
        <tbody> 
          <tr>
                  <th colspan="6" class="bold-events-titles live-table">   </th>
                  <th colspan="3" class="bold-events-titles live-table"> MATCH BET  </th>
                  <th colspan="2" class="bold-events-titles live-table"> DRAW NO BET  </th>
                  <th colspan="3" class="bold-events-titles live-table"> DOUBLE CHANCE  </th>
                  <th colspan="2" class="bold-events-titles live-table"> UNDER / OVER  </th>
                  <th colspan="1" class="bold-events-titles live-table">   </th>
              
          </tr>

          <tr>       <td colspan="1" class="bold-events-titles live-table"> Game No   </td>
              <td colspan="1" class="bold-events-titles live-table"> TIME   </td>
              <td colspan="4" class="bold-events-titles live-table"> GAME  </td>
              <td colspan="1" class="bold-events-titles live-table"> 1 </td>
              <td colspan="1" class="bold-events-titles live-table"> X </td>
              <td colspan="1" class="bold-events-titles live-table"> 2 </td>
              <td colspan="1" class="bold-events-titles live-table"> 1 </td>
              <td colspan="1" class="bold-events-titles live-table"> 2 </td>
              <td colspan="1" class="bold-events-titles live-table"> 1X </td>
              <td colspan="1" class="bold-events-titles live-table"> 12 </td>
              <td colspan="1" class="bold-events-titles live-table"> X2 </td>
              <td colspan="1" class="bold-events-titles live-table"> UNDER</td>
              <td colspan="1" class="bold-events-titles live-table"> OVER</td>
              <td colspan="1" class="bold-events-titles live-table">   </td>
          
          </tr>

          <tr>
              <td colspan="17" class="events-date"> 02 OCTOBER 2019 </td>

          </tr>


          <tr v-for="mydataObjectinfo in mydataObject.data" :key="mydataObjectinfo.id">
               <td colspan="1" class="bold-events-titles live-table">{{mydataObjectinfo.id}}</td>
              <td colspan="1" class="bold-events-titles live-table"> {{mydataObjectinfo.gametime}}   </td>
              
              <td colspan="4" class="bold-events-titles table-teams live-table"> <span class="table-league-name">Premier League </span> <br> <template v-if="mydataObjectinfo.home_teamname">	{{mydataObjectinfo.home_teamname.name}}</template> - <template v-if="mydataObjectinfo.away_teamname">	{{mydataObjectinfo.away_teamname.name}}</template>   </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 1.2</div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg">4.5 </div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 2.6</div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 1.1 </div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 1.03  </div>  </td>
              <td colspan="1" class="bold-events-titles live-table table-odds">  <div class="odds-bg"> 2.3 </div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 1.2 </div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds">  <div class="odds-bg">6.0 </div> </td>
              <td colspan="1" class="bold-events-titles live-table table-odds">  <div class="odds-bg"> 1.08 </div></td>
              <td colspan="1" class="bold-events-titles live-table table-odds"> <div class="odds-bg"> 1.01 </div></td>
              <td colspan="1" class="bold-events-titles live-table table-odds"><div class="more-odds-bg">  +98 <i class="more-odds-icon far fa-play-circle"></i>  </div>  </td>
          
          </tr>

          


        </tbody>

</table>





    </div>
    
  </div>
<!--- End of the Content ---->










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
                                 axios.get("api/gamefixtures").then(({ data }) => (this.mydataObject = data));
                                 
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

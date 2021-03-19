<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Branchpayout;
use App\Shopingcat;
use App\Productsale;
use App\Orderdetail;
use App\Orderssummary;

class ConfirmcustomerorderfromcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
 $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
     //   if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

    //  return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
       return   Orderssummary::latest('id')
       // ->where('del', 0)
       ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           










       // {
      // return Submheader::latest()
      //  -> where('ucret', $userid)
    //    ->paginate(15);
      //  }

      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //
       // return ['message' => 'i have data'];
      $userid =  auth('api')->user()->id;
      $branch =  auth('api')->user()->branch;
   $datepaid = date('Y-m-d');
 
   
   $users = DB::table('ordermakings')->where('ucret', $userid)->get();
     //getting the total invoice
     $totallineforinvoice = \DB::table('ordermakings')->where('ucret', '=', $userid)
     
    // ->where('status', '=', 1)
     //->orderByDesc('id')
     //->limit(1)
     ->sum('linetotalcost');

//// getting the invoice number
$dto = date('Ymd');

/// counting the existance of invoice number
$currentinvoicenumber = \DB::table('orderssummaries')->count();
if($currentinvoicenumber > 0)
{
    
$invoiceno1  = \DB::table('orderssummaries')->orderBy('id', 'Desc')->limit(1)->value('id');
$inv = $invoiceno1+1;
$invoiceno = "ord".$inv ."-".$dto;

}
if($currentinvoicenumber < 1)
{
    $inv =1;
//$invoiceno1  = \DB::table('orderssummaries')->orderBy('id', 'Desc')->limit(1)->value('id');
$invoiceno = "ord". $inv ."-".$dto;

}








   foreach ($users as $user) {
     
    Orderdetail::Create([
     'productname' => $user->productname,
     'quantity' => $user->quantity,
     'invoiceno' => $invoiceno,
     'quantity' => $user->quantity,
     'datemade' => $user->datemade,
     'qtyperunit' => $user->qtyperunit, 
     'linetotalcost' => $user->linetotalcost,
     'unitcost' => $user->unitcost,
     'lineunitcost' => $user->lineunitcost,
     
     'supplier' => $user->supplier,
     'brand' => $user->brand,
     'unitofmeasure' => $user->unitofmeasure,
     'smallunitmeasure' => $user->smallunitmeasure,
    // 'branch' => $user->branch,       
    // 'status' => 1,  
      
              'ucret' => $userid,
            
          ]);
      
 }
 /// Saving the Sales Summary
 Orderssummary::Create([
   
    'invoiceno' => $invoiceno,
  //  'branch' => $user->branch,
   'invoicedate' => $user->datemade,  
    //'branch' => $user->branch,       
     
    'invoiceamount' => $totallineforinvoice,     
             'ucret' => $userid,
           
         ]);
 DB::delete('delete from ordermakings where ucret = ?',[$userid]);
   
   
  //}
    }
///////////////////////////////////////////////////////////////////////


public function savebranchtobalance(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'branchnametobalance'   => 'required | String |max:191'
     //'amount'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
   //  $userbranch =  auth('api')->user()->branch;
   //  $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
   //  $hid = $id1+1;

  $datepaid = date('Y-m-d');
     
  //       $dats = $id;
       return Branchtobalance::Create([
      'branchnametobalance' => $request['branchnametobalance'],
     
 
      'ucret' => $userid,
    
  ]);
    }



































    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function Branchtotalsd()
    {
        //getSinglebranchpayoutdaily
        $ed = '0';
      //  return Branchpayout::where('del',0)->sum('amount');
      return   Branchpayout::latest('id')
      //  return   Branchpayout::latest('id')
         ->where('del', 0);
     //  ->paginate(13);
 
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Branchpayout::findOrfail($id);

        $this->validate($request,[
            'receiptno'   => 'required | String |max:191',
            'datemade'   => 'required',
            'branch'  => 'required',
            'amount'  => 'required'
    ]);

 
     
$user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

       // $user = Shopingcat::findOrFail($id);
      //  $user->delete();
       // return['message' => 'user deleted'];
       $userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
       DB::delete('delete from ordermakings where ucret = ?',[$userid]);

    }
}

<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Product;
use App\Shopingcat;
use App\Productsale;
use App\Productdelivery;
use App\Productprice;

class ItemdeliveryController extends Controller
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

    //  if($userrole == '101')
      {
    
        return   Ordermaking::with(['producttoorderName','brandName','unitMeasure','productSupplier'])->latest('id')
  ///  return   Product::latest('id')
       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


      
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



       $this->validate($request,[
       'productname'   => 'required',
       'brand'   => 'required',
       'sellingprice'   => 'required',
       'deliveringsupplier'   => 'required',
       'deliveringunitofmeasure' => 'required',
       'deliveringquantity' => 'required',
       'deliveringqtyperunit' => 'required',
       'deliveringsmallunitmeasure' => 'required',
       'invoiceno' => 'required',
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =   auth('api')->user()->id;
     $branch =   auth('api')->user()->branch;
     $datepaid = date('Y-m-d');

  
/// getting the Unit Price
$invoiceno = $request['invoiceno'];

$product = $request['productname'];
$recordto = $request['id'];


//$unitprice = \DB::table('productstocks') ->where('productcode', '=', $product)->value('unitprice');

/// checking if the product is on the cart
//$productexistsoncart = \DB::table('shopingcats')->where('productcode', '=', $product)->where('ucret', '=', $userid)->count();
//if($productexistsoncart < 1)
{
  Productdelivery::Create([
    
  
      'productname' => $request['productname'],
      'orderdate' => $request['datemade'],
     
      'qtyordered' => $request['quantity'],
      'ordersupplier' => $request['supplier'],
      'orderingmainunit' => $request['unitofmeasure'],
      'orderingsmallunit' => $request['smallunitmeasure'],
      'orderingqtyperunit' => $request['qtyperunit'],
      'orderingbrand' => $request['brand'],
      'costpriceforunit' => $request['unitcost'],
      'linecostprice' => $request['lineunitcost'],
      'deliveringmainunit' => $request['deliveringunitofmeasure'],
      'qtyofunitsdelivered' => $request['deliveringquantity'],
     

      'qtyperunitdelivered' => $request['deliveringqtyperunit'],
      'smallunitdelivered' => $request['deliveringsmallunitmeasure'],
      'sellingprice' => $request['sellingprice'],

      'deliveringsupplier' => $request['deliveringsupplier'],
      //'linetotal' => ($unitprice*( $request['quantity'])),
     
      'ucret' => $userid,
    
  ]);


  Productprice::Create([
    
  
    'productcode' => $request['productname'],
    //'orderdate' => $request['datemade'],
   
    'unitcost' => $request['lineunitcost'],
    'unitprice' => $request['sellingprice'],
    
    'lineprofit' => ($request['sellingprice']-( $request['lineunitcost'])),
   'profitperc' => 100*($request['lineunitcost']/( $request['sellingprice'])),
    'ucret' => $userid,
  
]);
        }

//         if($productexistsoncart > 0)
// {
  // $currentquantity = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('quantity');
 // $particularitemdetails = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('quantity');
 
 //$newquantity = $request['quantity']+$currentquantity;
  
 $result = DB::table('orderdetails')
     ->where('id', $recordto)
     ->update([
       'orderdeliverystatus' => 1
       //'linetotal' => (($newquantity*$unitprice))
     ]);
  
     
//         }
  //$datas =\DB::table('shopingcats')->get();

//  //foreach($datas as $data){
//   $users = DB::table('shopingcats')->where('ucret', $userid)->get();
    
//   foreach ($users as $user) {
    
//    Productsale::Create([
//     'productcode' => $user->productcode,
//     'unitprice' => $user->unitprice,       
            
//              'ucret' => $userid,
           
//          ]);
     
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
     $user = Productdelivery::findOrfail($id);

 $this->validate($request,[
  'productname'   => 'required',
  'sellingprice'   => 'required',
  'deliveringsmallunitmeasure'   => 'required',
  'deliveringqtyperunit'   => 'required',
  'deliveringquantity'   => 'required',
  'deliveringunitofmeasure'   => 'required',
  'deliveringsupplier'  => 'required'

    ]);

    Productdelivery::Create([
    
  
            'productname' => $request['productname'],
            'orderdate' => $request['orderdate'],
            'qtyordered' => $request['supplier'],
            'unitmeasure' => $request['unitmeasure'],
            'quantity' => $request['quantity'],
            'unitcost' => $request['unitcost'],
            'smallunitmeasure' => $request['smallunitmeasure'],
            'unitprice' => $unitprice,
            'linetotal' => ($unitprice*( $request['quantity'])),
           
            'ucret' => $userid,
          
        ]);
    

//     $user->update([
//         'productcode' =>  $request['productcode'],
//         'quantity' => $request['quantity'],
//         'unitprice' => (($request['unitprice'])),
//         'linetotal' => (($request['quantity']*$request['unitprice'])),
//        // 'password' => $request->input('password', $user->password),
//     ]);
     
///$user->update($request->all());




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

        $user = Shopingcat::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}

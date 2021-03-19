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
use App\ productstock;

class InserintocartController extends Controller
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
    //  return   Product::wvith(['userbalancingBranch','branchinBalance'])->latest('id')
  //  return   Shopingcat::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
  return   Shopingcat::with(['productName'])->latest('id')
  
  ///  return   Product::latest('id')
       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


     // if($userrole == '100')
      {
      
      
     // return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Product::latest('id')
       //  return   Branchpayout::latest('id')
    //     ->where('del', 0)
     //   ->paginate(20);
      
    }
      
    }

   
    public function store(Request $request)
    {
    
      
       $this->validate($request,[
       'quantity'   => 'required',
       'productcode'   => 'required',
    
     ]);
     $userid =  auth('api')->user()->id;
     $branch =  auth('api')->user()->branch;
  $datepaid = date('Y-m-d');

  
/// getting the Unit Price
$product = $request['productcode'];
$unitprice = \DB::table('productprices') ->where('productcode', '=', $product)->orderBy('id', 'Desc')->value('unitprice');
$unitcost = \DB::table('productprices') ->where('productcode', '=', $product)->value('unitcost');
/// checking if the product is on the cart
$productexistsoncart = \DB::table('shopingcats')->where('productcode', '=', $product)->where('ucret', '=', $userid)->count();
if($productexistsoncart < 1)
{
        Shopingcat::Create([
    

      'productcode' => $request['productcode'],
      'quantity' => $request['quantity'],
      'datesold' => $datepaid,
      'branch' => $branch,
      'unitprice' => $unitprice,
      'unitcost' => $unitcost,
      'linetotal' => ($unitprice*( $request['quantity'])),
     'totalcostprice'  => ($unitcost*( $request['quantity'])),
     'lineprofit'  => (($unitprice*( $request['quantity']))-($unitcost*( $request['quantity']))),
      'ucret' => $userid,
    
  ]);
        }

        if($productexistsoncart > 0)
{
  $currentquantity = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('quantity');
  $cp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitcost');
  $sp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitprice');
 
$newquantity = $request['quantity']+$currentquantity;
  
$result = DB::table('shopingcats')
    ->where('productcode', $product)
    ->update([
      'quantity' => $newquantity,
      'linetotal' => (($newquantity*$unitprice)),
      'totalcostprice'  => ($cp*($newquantity)),
      'lineprofit'  => (($sp*($newquantity))-($cp*($newquantity))),
    ]);
  
     
        }
 
}
  
  
  
    public function show($id)
    {
        //
    }
   
  



     
    public function update(Request $request, $id)
    {
        //
        $user = Shopingcat::findOrfail($id);
        $userid =  auth('api')->user()->id;
        $branch =  auth('api')->user()->branch;
$this->validate($request,[
  'productcode'   => 'required',
  'unitprice'   => 'required',
  'quantity'   => 'required'

    ]);
    $product = $request['productcode'];
    $up = $request['unitprice'];
    $qty = $request['quantity'];

    $cp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitcost');
    $sp = $request['unitprice'];
   
    $user->update([
        'productcode' =>  $request['productcode'],
        'quantity' => $request['quantity'],
        'unitprice' => (($request['unitprice'])),
        'linetotal' => (($request['quantity']*$request['unitprice'])),
        'totalcostprice' => (($qty*$cp)),
        // 'totalcostprice'  => ($cp*($newquantity)),
        'lineprofit'  => (($qty*$sp)-( ($qty*$cp) )),
       
    ]);
     
///$user->update($request->all());
    }

    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Shopingcat::findOrFail($id);
        $user->delete();
    
    }
}

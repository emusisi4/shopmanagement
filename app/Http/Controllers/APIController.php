<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Country;
use App\Gender;
use App\Yesonostate;
use App\Studentclasses;
use App\State;
use App\Expense;
use App\Expensescategory;
use App\Expensetype;
use App\MainheadersCategory;
use App\Mainheaders;
use App\Branch;
use App\Branchpayout;
use App\Mainmenucomponent;
use App\Branchtobalance;
use App\Shopbalancingrecord;
use App\Branchtocollect;
use App\Cintransfer;
use App\ExpenseWalet;
use App\Incomereporttoview;
use App\Mmaderole;
use App\Roletoaddcomponent;
use App\Componentsaccesse;
use App\Thecomponent;
use App\Roleinaction;
use App\Submheader;
use App\Formcomponent;
use App\Brand;
use App\Unitmeasure;
use App\Productcategory;
use App\Product;
use App\Supplier;
use App\Company;
use App\Orderssummary;
use App\Orderdetail;
use App\Ordertoview;
class APIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
  $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

// start of Shop Balancing
public function GetShopbalancingrecords()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
    if($userrole == 101)
    {
$data = Branch::latest('id')
->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
    if($userrole != 101)
    {
$data = Branch::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
}


/// End of Shop Balancing




























































































public function index()
    {
        //
       // return Student::all();
     return  Country::latest('id')
  //   ->where('del', 0)
     ->get();
      // return Student::all()->sortByDesc("id");
    }
    
   
    public function getSubmenues()
    {
     
$data = Submheader::latest('id')
->where('del', 0)
->get();
        return response()->json($data);
    }
    public function getMainmenues()
    {
     
$data = Mainmenucomponent::latest('id')
->where('del', 0)
->get();
        return response()->json($data);
    }

    public function getExpensestomake()
    {
     
$data = Expense::latest('id')
->where('del', 0)
->get();
        return response()->json($data);
    }
/// brands
public function getcompaniesd()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Company::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}

public function gettheorders()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Orderssummary::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}
/// brands
public function getbrands()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Brand::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}
public function getproducts()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Product::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}
public function getsuppliers()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Supplier::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}
public function getcategories()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Productcategory::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}
public function getunits()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Unitmeasure::latest('id')
//->where('branchno', $userbranch)
->get();
    return response()->json($data);
    }
  
}

public function getmainunits()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Unitmeasure::latest('id')
->where('rop', 1)
->get();
    return response()->json($data);
    }
  
}

public function getminorunits()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  //  if($userrole == 101)
    {
$data = Unitmeasure::latest('id')
->where('rop', 2)
->get();
    return response()->json($data);
    }
  
}

    public function getBranches()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        if($userrole == 101)
        {
$data = Branch::latest('id')
->where('branchno', $userbranch)
->get();
        return response()->json($data);
        }
        if($userrole != 101)
        {
$data = Branch::latest('id')
//->where('branchno', $userbranch)
->get();
        return response()->json($data);
        }
    }

    public function getmainmenus()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $roleto  = Rolenaccmain::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('roleto');  
        {
          $existanyauthorised = \DB::table('rolenaccmains')->where('roleto', '=', $roleto) ->count();
          
          if($existanyauthorised > 0)
          {
  $allowedmain  = \DB::table('rolenaccmains')->where('roleto', $roleto)->get();

//// checking if the records exist 




 foreach ($allowedmain as $rowall)
  {
      $component = ($rowall->component);
  }
$data = Mainmenucomponent::latest('id')
->where('id', '!=', $component)
->get();
        return response()->json($data);
        }
      }/////


      if($existanyauthorised < 1)
          {
  
$data = Mainmenucomponent::latest('id')
//->where('sysname', '!=', $component)
->get();
        return response()->json($data);
        }
     ///





    }




    public function getmissicomps()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $roleto  = Roletoaddcomponent::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
        {
          $existanyauthorised = \DB::table('componentsaccesses')->where('mmaderole', '=', $roleto) ->count();
          
         // if($existanyauthorised > 0)
          {
  $allowedmain  = \DB::table('componentsaccesses')->where('mmaderole', $roleto)->get();

//// checking if the records exist 




 foreach ($allowedmain as $rowall)
  {
      $component = ($rowall->componentto);
  }
$data = Thecomponent::latest('id')
//->where('sysname', '!=', $component)
->get();
        return response()->json($data);
        }
      }/////


      if($existanyauthorised < 1)
          {
  
$data = Thecomponent::latest('id')
//->where('sysname', '!=', $component)
->get();
        return response()->json($data);
        }
     ///





    }



    public function getcomponentslist()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $roleto  = Roletoaddcomponent::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
      
$data = Thecomponent::latest('name')
//->where('sysname', '!=', $component)
->get();
        return response()->json($data);
    




    }




    public function getrolename()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;

        $roleto  = Roleinaction::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');

        $data  = Roleinaction::latest('id')->where('roleno', $roleto)->orderBy('id', 'Desc')->limit(1)->value('name');


        return response()->json($data);
  
    }


    public function getrolesmanmade()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;

   
$data = Mmaderole::latest('id')
//->where('branchno', $userbranch)
->get();
        return response()->json($data);
  
    }

    public function getformfeatures()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;

   
$data = Formcomponent::latest('id')
//->where('branchno', $userbranch)
->get();
        return response()->json($data);
  
    }

    
    public function getlistofexpenses()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;

$component = 'expenses';
$actonaddnew = 'addnew';
      $wordCount = \DB::table('mycomponentfeatures')
    ->where('component', '=', $component)
      ->where('formcomponent', '=', $actonaddnew)
      ->count();
     // return response()->json($wordCount);




if($userrole == 'user')
{
$data = Expense::latest('id')
->where('ucret', $userid)
->get();
        return response()->json($data);
}   
if($userrole == 'admin')
{
$data = Expense::latest('id')
//->where('ucret', $userid)
->get();
        return response()->json($data);
}
    }



    public function getWallets()
    {
     
$data = ExpenseWalet::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }



    public function getstudendClasses()
    {
     
$data = Studentclasses::latest('odd')
->where('del', 0)
->get();
        return response()->json($data);
    }
    public function getGenders()
    {
        $data = Gender::get();

        return response()->json($data);
    }
    public function getSections()
    {
        $data = Ssection::get();

        return response()->json($data);
    }
    public function getexpensecategoriesdy()
    {
        $data = Expensescategory::get();

        return response()->json($data);
    }
    public function getmainheaders()
    {
        $data = Mainheaders::get();

        return response()->json($data);
    }
    public function getexpensetypes()
    {
        $data = ExpenseType::get();

        return response()->json($data);
    }


    
    public function getsystemroles()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $company =  auth('api')->user()->comp;

if($userrole != '900')
{
 $rolesdata = \DB::table('roles')
    ->where('roleid', '!=', 900)
    ->where('roleid', '!=', 100)
    //->where('comp', '==', $company)
    ->get();
  return response()->json($rolesdata);
}
if($userrole == '900')
{
 $rolesdata = \DB::table('roles')
 //   ->where('roleid', '!=', 900)
   // ->where('roleid', '!=', 100)
    //->where('comp', '==', $company)
    ->get();
  return response()->json($rolesdata);
}
// $data = Expense::latest('id')
//->where('ucret', $userid)
//->get();
 //   return $wordCount;
   // $dailyTotal = BooksCheckout::whereBetween('checkout_date', ['2018-04-04 00:00', '2018-04-04 23:59'])->sum('amount');
}


    
    public function getyesandnooptions()
    {
        $data = Yesonostate::get();

        return response()->json($data);
    }

    public function getCountries()
    {
        $data = Country::get();

        return response()->json($data);
    }

    public function getStates(Request $request)
    {
        $data = State::where('country_id', $request->country_id)->get();

        return response()->json($data);
    }



public function Branchtodayscashout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $currentdate = date('Y-m-d');
    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     //$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashout = \DB::table('couttransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashout;
}

}
//////////
public function Branchtobalancedayscashout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashout = \DB::table('cintransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $dateinquestion)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashout;
}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function Branchtodaysexpenses()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
   //  $dateinquestion  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
    $currentdate = date('Y-m-d');
   $totalexpenses = \DB::table('madeexpenses')
   
    ->where('branch', '=', $branchto)
    ->where('datemade', '=', $currentdate)
    ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalexpenses;
}

}




























public function Branchtobalancedayexpenses()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalexpenses = \DB::table('madeexpenses')
   
    ->where('branch', '=', $branchto)
    ->where('datemade', '=', $dateinquestion)
    ->where('approvalstate', '=', 1)
    ->where('explevel', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalexpenses;
}

}

///////////
public function Branchtobalancedaypayout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalpayout = \DB::table('branchpayouts')
   
    ->where('branch', '=', $branchto)
    ->where('datepaid', '=', $dateinquestion)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalpayout;
}

}



public function Branchtodayspayout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totalpayout = \DB::table('branchpayouts')
   
    ->where('branch', '=', $branchto)
    ->where('datepaid', '=', $currentdate)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalpayout;
}

}



public function Currencysymbol()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
 $compny =  auth('api')->user()->comp;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    //   $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
  
    $currentdate = date('Y-m-d');
   $companycu = \DB::table('companydetails')
   
    ->where('id', '=', $compny)
  //  ->where('transferdate', '=', $currentdate)
 //   ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->value('currencysymbol');
    return $companycu;
}

}



public function getselectedordertotal()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{
  $ordertovire  = Ordertoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('ordertoview'); 
  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('orderdetails')
   ->where('invoiceno', $ordertovire)
    //->where('ucret', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
   // ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotalcost');
    return $totalcattotal;
}

}



public function Ordertotal()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{

  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('ordermakings')
   
    ->where('ucret', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
   // ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotalcost');
    return $totalcattotal;
}

}



public function getuserbalance()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{

  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('userwallets')
   
    ->where('username', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
   // ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('ubalance');
    return $totalcattotal;
}

}


public function Carttotal()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{

  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('shopingcats')
   
    ->where('ucret', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotal');
    return $totalcattotal;
}

}






public function Branchtodayscashin()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    /// $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
    $currentdate = date('Y-m-d');
   $totalcashin = \DB::table('cintransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashin;
}

}







public function approvecashin(Request $request)

{
    //
 //   $this->authorize('isAdmin'); 

    $user = Cintransfer::findOrFail($id);
    $user->delete();
   // return['message' => 'user deleted'];

}























































































public function Branchtobalancedayscashin()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashin = \DB::table('couttransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $dateinquestion)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashin;
}

}

//////////////////////////////////////////////////////////////////////////

































public function Branchnametocollectfrom()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   // $bnames = \DB::table('branches')
   
  //  ->where('branchno', '=', $bnames)
    //->orderByDesc('id')
    //->limit(1)
  //  ->sum('clcash');
    return $bnames;
}



}




public function Branchnametobalancefunction()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $bnames  = Branch::where('branchno', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   // $bnames = \DB::table('branches')
   
  //  ->where('branchno', '=', $bnames)
    //->orderByDesc('id')
    //->limit(1)
  //  ->sum('clcash');
    return $bnames;
}



}

//// End of Access Controlls 

public function Bopenningbalancetoday()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];


   // $closingcash = \DB::table('shopbalancingrecords')
   
   // ->where('branch', '=', $branchto)
   // ->orderByDesc('id')
   // ->limit(1)
   // ->get('clcash');

    $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    $closingcash  = Shopbalancingrecord::where('branch', $branchto)->orderBy('id', 'Desc')->limit(1)->value('clcash');

    return $closingcash;
}



}



public function Bopenningbalance()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];


   // $closingcash = \DB::table('shopbalancingrecords')
   
   // ->where('branch', '=', $branchto)
   // ->orderByDesc('id')
   // ->limit(1)
   // ->get('clcash');

    $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    $closingcash  = Shopbalancingrecord::where('branch', $branchto)->orderBy('id', 'Desc')->limit(1)->value('clcash');

    return $closingcash;
}



}

public function Branchnametobalance()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branch::where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
    $closingcash = \DB::table('shopbalancingrecords')
   
    ->where('branch', '=', $branchto)
    ->orderByDesc('id')
    ->limit(1)
    ->sum('clcash');
    return $closingcash;
}



}


public function Rangeexpensesreport()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $startdat = DB::table('expensereporttoviews')->where('ucret', $userid)->value('startdate');
  $enddate = DB::table('expensereporttoviews')->where('ucret', $userid)->value('enddate');
  $branchto = DB::table('expensereporttoviews')->where('ucret', $userid)->value('branch');
  $reporyttype = DB::table('expensereporttoviews')->where('ucret', $userid)->value('reporttype');


  //$startdat = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');


  //$enddate = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  if($reporyttype == "expreportbybranch")
      {
if($branchto != 900)
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   ->where('branch','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($branchto = '900')
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   //->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
      }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($reporyttype == "expreportbywallet")
      {
if($branchto != 900)
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   ->where('walletexpense','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($branchto = '900')
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   //->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
      }

//////////////////////////////////////////////////////////////////////////////////////////////////


}///closing admin


}
public function Rangecollection()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $startdat = DB::table('incomereporttoviews')->where('ucret', $userid)->value('startdate');
  $enddate = DB::table('incomereporttoviews')->where('ucret', $userid)->value('enddate');
  $branchto = DB::table('incomereporttoviews')->where('ucret', $userid)->value('branch');



  //$startdat = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');


  //$enddate = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
if($branchto != 900)
{
    $dailyrecord = \DB::table('cintransfers')
   
   ->whereBetween('transferdate', [$startdat, $enddate])
 
   ->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($branchto = '900')
{
    $dailyrecord = \DB::table('cintransfers')
   
   ->whereBetween('transferdate', [$startdat, $enddate])
 
   //->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
}


}

public function Rangecredits()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $startdat = DB::table('incomereporttoviews')->where('ucret', $userid)->value('startdate');
  $enddate = DB::table('incomereporttoviews')->where('ucret', $userid)->value('enddate');
  $branchto = DB::table('incomereporttoviews')->where('ucret', $userid)->value('branch');



  //$startdat = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');


  //$enddate = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
if($branchto != 900)
{
    $dailyrecord = \DB::table('couttransfers')
   
   ->whereBetween('transferdate', [$startdat, $enddate])
 
   ->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($branchto = '900')
{
    $dailyrecord = \DB::table('couttransfers')
   
   ->whereBetween('transferdate', [$startdat, $enddate])
 
   //->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
}


}



public function Expensesrangeonreport()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $startdat = DB::table('expensereporttoviews')->where('ucret', $userid)->value('startdate');
  $enddate = DB::table('expensereporttoviews')->where('ucret', $userid)->value('enddate');
  $branchto = DB::table('expensereporttoviews')->where('ucret', $userid)->value('branch');
  $reporyttype = DB::table('expensereporttoviews')->where('ucret', $userid)->value('reporttype');



  //$startdat = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');


  //$enddate = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');




if($reporyttype ="expreportbybranch" and $branchto != 900)
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
   ->where('approvalstate','=', 1)
   ->where('branch','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($reporyttype ="expreportbybranch" and $branchto = '900')
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   ->where('approvalstate','=', 1)
    ->sum('amount');
    return $dailyrecord;
}
}


}
public function Rangeexpenses()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $startdat = DB::table('incomereporttoviews')->where('ucret', $userid)->value('startdate');
  $enddate = DB::table('incomereporttoviews')->where('ucret', $userid)->value('enddate');
  $branchto = DB::table('incomereporttoviews')->where('ucret', $userid)->value('branch');



  //$startdat = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');


  //$enddate = Incomereporttoview::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
if($branchto != 900)
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
   ->where('approvalstate','=', 1)
   ->where('branchto','=', $branchto)
    ->sum('amount');
    return $dailyrecord;
}
if($branchto = '900')
{
    $dailyrecord = \DB::table('madeexpenses')
   
   ->whereBetween('datemade', [$startdat, $enddate])
 
   //->where('branchto','=', $branchto)
   ->where('approvalstate','=', 1)
    ->sum('amount');
    return $dailyrecord;
}
}


}
//// Statrt OF TOTALS
//Daily expenses
public function Branchdailyexpenses()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
    $dailyrecord = \DB::table('madeexpenses')
   
   // ->where('del', '=', 0)
    ->sum('amount');
    return $dailyrecord;
}



}
////
public function getLatestopenningbalance()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
    /// getting the branch in question
   
    $branchto  = DB::table('branchtobalances')

    ->select('branchnametobalance')
   // ->where('ucret', '=', 68)
     ->get();
    
    $openningbalance = \DB::table('shopbalancingrecords')
   
    ->where('branch', '=', $branchto)
    ->orderBy('id', 'Desc')
    ->take(1)
    ->sum('clcash');
    return $branchto;
}



}
///// checkfor a pending transfer
public function checkforapendingtransfercashin()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
 $cashintransfer = \DB::table('cintransfers')

    ->where('branchto', '=', $userbranch)
    ->where('status', '=', 0)
    ->count();

    return $cashintransfer;
   
}
///// Counting if a record is already balanced
public function getIfthebranchisalreadybalanced()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

//////////// geting the shop to balance
$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
 $branchtobalanceexisits = \DB::table('shopbalancingrecords')

    ->where('branch', '=', $branchto)
    ->where('datedone', '=', $dateinquestion)
    ->count();

    return $branchtobalanceexisits;
   
}
/////////////////////components access

public function branchpayoutadminaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='BranchpayoutAdmin';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function submenucomponentaccessaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='submenucomponentsettoings';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function mainmenucomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='mainmenucomponentsvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function systemvuecomponentscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='mycomponentsaccess';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccesssubmenucomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='submensettings';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function acccessadmincashissuecomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopcashouttoadmin';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessadmincashcollectioncomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='adminshopcashinorcocclectios';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessofficemakeexpensecomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='officemakeexpensevue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessmainmenucomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='mainmenucomponentsvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessincomereportcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='incomereportcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessexpensesreportbywalletcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='Expensesreportbywallet';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function acccessexpensesreportbydatecomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='Expensesreportbydate';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessexpensesreportbybranchcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='Expensesreportbybranch';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccesscompanyexpensescomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='Expensescomponentcompany';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessbranchescomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='Branches';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessbranchexpensesbranchcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='makeexpensevue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessshopcashintransactionscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchescashintransactions';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function acccessshopcasouttransactionscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchescashouttransactions';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function acccessshoppayoutcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='BranchespayoutVue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


///////////////

public function acccessrolescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='rolesdecompnet';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}







public function acccessproductbrandscomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='productbrand';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

//////////////////////////////////////////////////////////////////////
public function acccesscustomerscomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='customerscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}





public function acccessproductcategoriescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='productcategory';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessproductunitofmeasurecomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='productunitmeasure';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



//////////////////////








public function acccessbranchexpensescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchexpensescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function acccessofficeexpensescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='officeexpensescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}






















public function acccessexpensetypescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensetypescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function acccessexpensecategoriescomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensecategoriescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function acccesssettingscomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='settingsvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

///////////



public function existsordertoview()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
//$comp ='contactsaccessvue';
 $roleisallowedtoaccess = \DB::table('ordertoviews')

    ->where('ucret', '=', $userid)
   // ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

/////////////////////////////









public function acccesscontactscomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='contactsaccessvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}




public function acccesscompanyproductscomponentaccesscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='companyproductsaccessvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function acccessshopbalancingcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopbalancingvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function acccessuserscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='users';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

//////////////////////////////////////////////////////// working on components access

/////////////////////////////////////////////////////// Product

/// Product
public function getAddnewproductcategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productcategory";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditproductcategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productcategory";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteproductcategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productcategory";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewproductcategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productcategory";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

///////////////////////////////////////////////////////////////////////////////////

public function getAddnewexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getviewexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

///////////////////////////////////////////////////////////////////////////////////////////////////





public function getAddnewexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getviewexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product Edit
public function geteditexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view


////////////////////////////////////////////////////////////


public function getAddnewrole()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "rolesdecompnet";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getviewrole()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "rolesdecompnet";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product Edit
public function geteditrole()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "rolesdecompnet";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleterole()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "rolesdecompnet";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
/////////////////////////////////////////////////////////////////////////////
public function getAddnewofficeexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "officemakeexpensevue";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getviewofficeexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "officemakeexpensevue";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product Edit
public function geteditofficeexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "officemakeexpensevue";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteofficeexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "officemakeexpensevue";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

/////////////////


































////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function getAddgeneralexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "Expensescomponentcompany";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditgeneralexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "Expensescomponentcompany";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeletegeneralexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "Expensescomponentcompany";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewgeneralexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "Expensescomponentcompany";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}


































////

/// Product Unit Measure
public function getAddnewproductunitmeasure()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productunitmeasure";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditproductunitmeasure()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productunitmeasure";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteproductunitmeasure()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productunitmeasure";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewproductunitmeasure()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productunitmeasure";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}


////////////////

/// Product Unit Measure
public function getAddnewproductbrand()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productbrand";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditproductbrand()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productbrand";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteproductbrand()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productbrand";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewproductbrand()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "productbrand";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
/////////////////////////
public function getAddnewmainmenu()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenucomponentsvue";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditmainmenu()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenucomponentsvue";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeletemainmenu()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenucomponentsvue";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
// //// product view
// public function getviewproduct()
// {
//   $userid =  auth('api')->user()->id;
//   $userbranch =  auth('api')->user()->branch;
//   $userrole =  auth('api')->user()->type;
//   $udefinedrole =  auth('api')->user()->mmaderole;

// //$data = DB::table('users')->count();
// $component = "companyproductsaccessvue";
// $actonaddnew = 'viewdetails';

//  $wordCount = \DB::table('mycomponentfeatures')
//    ->where('component', '=', $component)
//     ->where('formcomponent', '=', $actonaddnew)
//     ->where('rolein', '=', $udefinedrole)
//     ->count();

//     return $wordCount;
  
// }
///////////////////////////////////////////////////////////////////////////////////////////////

public function getAddnewcustomer()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "customerscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditcustomer()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "customerscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeletecustomer()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "customerscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

public function getviewcustomer()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "customerscomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}













































public function getAddnewsupplier()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "supplierscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditsupplier()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "supplierscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeletesupplier()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "supplierscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewsupplier()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "supplierscomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

///////----------------------------------------------------------------///////////////////

public function getaddnewproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "companyproductsaccessvue";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

//// product Edit
public function geteditproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "companyproductsaccessvue";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product delete
public function getdeleteproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "companyproductsaccessvue";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
//// product view
public function getviewproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "companyproductsaccessvue";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function getaddnewbalancingrecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingvue";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

public function getviewbalancingrecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingvue";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function geteditbalancingrecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingvue";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getdeletebalancingrecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingvue";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

public function getAddnewshopcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchescashouttransactions";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}


public function getviewshopcollectionrecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchescashouttransactions";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function geteditshopcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchescashouttransactions";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
public function getdeleteshopcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchescashouttransactions";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}

///////////////////////////////////////////////////////////////////////////
public function getaddnewexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;


//$data = DB::table('users')->count();
$component = "makeexpense";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('componentroleallowed')
//->where('component', '=', $component)
    ->where('actioncheck', '=', $actonaddnew)
    ->count();
//    return response()->json($wordCount);
// $data = Expense::latest('id')
//->where('ucret', $userid)
//->get();
    return $wordCount;
   // $dailyTotal = BooksCheckout::whereBetween('checkout_date', ['2018-04-04 00:00', '2018-04-04 23:59'])->sum('amount');
}




///////////////////////////////////////////////////////////////////
public function getSinglebranchpayoutdaily()
{
    //getSinglebranchpayoutdaily
    $ed = '0';
    $data = Branchpayout::sum('amount');
    return response()->json($data);
}




}/// closing the General Controller Brace


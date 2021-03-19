<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;

class ExpensesController extends Controller
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
        if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

     if($userrole != '101')
     {
      
         return   Expense::with(['ExpenseTypeconnect','expenseCategory'])->latest('id')
        ->where('del', 0)
       ->paginate(20);
     }
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



       $this->validate($request,[
        'expensename'   => 'required | String |max:191',
        'expensecategory'   => 'required',
        'expensetype'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     $hid = $id1+1;

  
     
  //       $dats = $id;
       return Expense::Create([
      'expensename' => $request['expensename'],
     'expenseno' => $hid,
      'description' => $request['description'],
      'expensecategory' => $request['expensecategory'],
      'expensetype' => $request['expensetype'],
     // 'mainheadercategory' => $request['mainheadercategory'],
 
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
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function search(){

      if ($search = \Request::get('q')) {
          $users = Expense::where(function($query) use ($search){
              $query->where('expensename','LIKE',"%$search%")
                      ->orWhere('description','LIKE',"%$search%");
          })->paginate(20);
      }else{
          $users = Expense::latest()->paginate(5);
      }

      return $users;
    }



     public function update(Request $request, $id)
    {
        //
        $user = Expense::findOrfail($id);

$this->validate($request,[
  'expensename'   => 'required | String |max:191',
  'expensecategory'   => 'required',
  'expensetype'  => 'required'
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

        $user = Expense::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}

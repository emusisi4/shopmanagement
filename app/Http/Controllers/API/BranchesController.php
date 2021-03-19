<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Madeexpense;

class BranchesController extends Controller
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


     
        // return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // ->where('del', 0)
      // ->paginate(13);
      //if($userid != 2)
      { 
        
        $pagnaf = 10;


        $data = [];
    
        $childCategory = Branch::wheredel( '0' )->get();
    
        foreach ( $childCategory as $childCat ) {
    
            $checkChildes = Madeexpense::wherebranch( $childCat->id )->count();
            
           
    
            $data[] = [ $childCat->id,
                       
                       
                   
                        $childCat->branchname,
                        $checkChildes
                    ];
        }
    
        return response()->json( [$data] );



     //   return     Branch::latest('id')
       // ->where('del', 0)
       // ->get();
     //  ->paginate($pagnaf);
//$dd = 
//        DB::table('branches')->paginate(15);
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
        'branchname'   => 'required | String |max:191'
       // 'iconclass'   => 'required',
       // 'dorder'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $id1  = Branch::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('id');
     $hid = $id1+1;

  
     
  //       $dats = $id;
       return Branch::Create([
      'branchname' => $request['branchname'],
     'branchno' => $hid,
      'location' => $request['location'],
      'contact' => $request['contact'],
     
 
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
    public function update(Request $request, $id)
    {
        //
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

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

        $user = Branch::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}

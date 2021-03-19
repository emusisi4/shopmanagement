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

use App\Componentsaccesse;
use App\Rolenaccmain;
use App\Roleinaction;
use App\Rolenaccsumbmen;
class GiveaccesstosubmenuController extends Controller
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

      if($userrole == '101')
      {
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('branch', $userbranch)
        ->paginate(20);
      }


      if($userrole == '100')
      {
      
      
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
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
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
 


       $this->validate($request,[
      'roleyouareaddingtocomponent'   => 'required | String |max:191',
       'components'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $roleee = $request['roleyouareaddingtocomponent'];
     $compo =  $request['components'];
     /// Getting the main header
     
     $mainheader  = Submheader::where('id', $compo)->value('mainheadercategory');
     $roleto  = Roleinaction::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');
     DB::table('rolenaccsumbmens')->where('roleto', $roleee)->where('component', $compo)->delete();
       return Rolenaccsumbmen::Create([
      'roleto' => $request['roleyouareaddingtocomponent'],
      'component' => $request['components'],
      'mainheader' => $mainheader,


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

        $user = Rolenaccsumbmen::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}

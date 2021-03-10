<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
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
       

     //   $this->authorize('isSuperadmin'); 
        return   User::with(['userRole','userBranch'])->latest('id')
       // ->where('del', 0)
       ->paginate(13);




        
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
        'name'   => 'required | String |max:191',
     'email'   => 'required | String |email|max:191|unique:users',
    'password'   => 'required | String |min:2',
    'type'   => 'required'
     ]);
     $userid =  auth('api')->user()->id;
     
     
     
     return User::Create([
      'name' => $request['name'],
      'email' => $request['email'],
      'type' => $request['type'],
      'bio' => $request['bio'],
      'branch' => $request['branch'],
      'photo' => $request['photo'],
      'ucret' => $userid,
      'password' => Hash::make($request['password']),
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
    public function profile()
    {
        return auth('api')->user();
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
        $user = User::findOrfail($id);

$this->validate($request,[
    'name'   => 'required | String |max:191',
    'email'   => 'required | String |email|max:191|unique:users,email,'.$user->id,
    'password'   => 'sometimes |min:2'

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
      // $this->authorize('isAdmin'); 
       $this->authorize('isSuperadmin'); 

        $user = User::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}

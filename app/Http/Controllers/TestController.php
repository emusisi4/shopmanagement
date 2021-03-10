<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

        return response()->json([
            'users' => \App\User::latest()->get()
        ], Response::HTTP_OK);
        
    }

    public function delete_user($id)
    {
       $single_user_id = explode(',' , $id);

       foreach($single_user_id as $id) {
           \App\User::findOrFail($id)->delete();
       }

    }

}

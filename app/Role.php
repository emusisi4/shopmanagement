<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
   // protected $table = 'nur_classes';
    protected $fillable = ['rolename','roleid','description'];
public function students(){
    // creating a relationship between the students model 
    return $this->hasMany(User::class, 'type', 'roleid'); 
}
   


   

}

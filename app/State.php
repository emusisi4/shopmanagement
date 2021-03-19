<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = 'states';
    protected $fillable = ['name'];

   

}

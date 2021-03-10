<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bio','photo','type','ucret','branch',
    ];
    public function userRole(){
        // creating a relationship between the students model 
        return $this->belongsTo(Role::class, 'type'); 
    }
    public function userBranch(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    public function userbalancingBranch(){
        // creating a relationship between the students model 
        return $this->belongsTo(Shopbalancingrecord::class, 'branch'); 
    }
    public function usersendingtransferCin(){
        // creating a relationship between the students model 
        return $this->belongsTo(Cintransfer::class, 'ucret'); 
    }
    public function usercompletingtransferCin(){
        // creating a relationship between the students model 
        return $this->belongsTo(Cintransfer::class, 'ucomplete'); 
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

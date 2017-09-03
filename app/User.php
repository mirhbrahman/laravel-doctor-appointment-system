<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    protected $primaryKey = 'user_id';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id','name', 'email', 'password','role_id','is_active',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRole()
    {
        return $this->belongsTo('App\Role','role_id');
    }

    public function isAdmin()
    {
        return false;
    }

    public function isHospital()
    {
        if ($this->userRole->name == 'Hospital') {
            return true;
        }
        return false;
    }

    public function isDoctor()
    {
        if ($this->userRole->name == 'Doctor') {
            return true;
        }
        return false;
    }

    public function isPatient()
    {
        if ($this->userRole->name == 'Patient') {
            return true;
        }
        return false;
    }

    public function hosBranches()
    {
        return $this->hasMany('App\Model\Hospital\HosBranch','user_id');
    }

    //...........hospital all department
    public function hosDepts()
    {
        return $this->hasMany('App\Model\Hospital\Department','user_id');
    }



    public function hosBasicInfo()
    {
        return $this->belongsTo('App\Model\Hospital\HosBasicInfo','user_id','user_id');
    }

    public function docBasicInfo()
    {
        return $this->belongsTo('App\Model\Doctor\DocBasicInfo','user_id','user_id');
    }

    public function patientBasicInfo()
    {
        return $this->belongsTo('App\Model\Patient\PatientBasicInfo','user_id','user_id');
    }




}

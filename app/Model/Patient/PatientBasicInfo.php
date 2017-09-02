<?php

namespace App\Model\Patient;

use Illuminate\Database\Eloquent\Model;

class PatientBasicInfo extends Model
{
    protected $fillable = ['user_id','phone','dob','address','about','image'];
}

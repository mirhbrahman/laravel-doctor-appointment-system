<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appoint extends Model
{
    protected $fillable = ['relation_id','patient_id'];
}

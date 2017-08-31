<?php

namespace App\Model\Hospital;

use Illuminate\Database\Eloquent\Model;

class HosDocFee extends Model
{
    protected $fillable = ['relation_id','fee','status'];
}

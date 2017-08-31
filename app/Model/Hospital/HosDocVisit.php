<?php

namespace App\Model\Hospital;

use Illuminate\Database\Eloquent\Model;

class HosDocVisit extends Model
{
    protected $fillable = ['relation_id', 'sat_s', 'sat_e', 'sun_s', 'sun_e', 'mon_s', 'mon_e', 'tue_s', 'tue_e', 'wed_s', 'wed_e', 'thu_s', 'thu_e', 'fri_s', 'fri_e', 'status'];
}

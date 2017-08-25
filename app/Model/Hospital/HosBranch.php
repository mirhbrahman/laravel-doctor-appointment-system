<?php

namespace App\Model\Hospital;

use Illuminate\Database\Eloquent\Model;

class HosBranch extends Model
{
    protected $fillable = ['user_id','name','email','phone','address','about'];
}

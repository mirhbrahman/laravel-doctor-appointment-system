<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = ['hos_id','doc_id','branch_id','dept_id','status','action_user_id'];
}

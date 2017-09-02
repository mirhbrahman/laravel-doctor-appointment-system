<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = ['hos_id','doc_id','branch_id','dept_id','status','action_user_id'];

	public function branch()
	{
		return $this->belongsTo('App\Model\Hospital\HosBranch','branch_id');
	}
	public function dept()
	{
		return $this->belongsTo('App\Model\Hospital\Department','dept_id');
	}
	public function docBasicInfo()
    {
        return $this->belongsTo('App\Model\Doctor\DocBasicInfo','doc_id','user_id');
    }

    public function docFee()
    {
        return $this->belongsTo('App\Model\Hospital\HosDocFee','id','relation_id');
    }
    public function docVisit()
    {
        return $this->belongsTo('App\Model\Hospital\HosDocVisit','id','relation_id');
    }
}

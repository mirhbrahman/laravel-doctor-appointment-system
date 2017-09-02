<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Relation;

class HospitalsController extends BaseController
{
    public function index()
    {
		//..........find all member hospital
		$hospitalList = Relation::select('relations.*','users.name','users.email')
		->join('users','relations.hos_id','=','users.user_id')
		->where('relations.doc_id',$this->user->user_id)
		->where('status',1)
		->get();

        return view('doctor.hospital.list',compact('hospitalList'));
    }
}

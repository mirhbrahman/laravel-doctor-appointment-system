<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Model\Hospital\HosBranch;
use App\Model\Relation;

class SearchController extends Controller
{
    public function index()
    {
    	return view('search.index');
    }

	//.............get all the hospitals
	public function getHospitals()
	{
		//...........get id of hospital role
		$role_id = Role::where('name','Hospital')->first()->id;
		$hospitalList = User::where('role_id',$role_id)->get();
		return  view('search.hospital.list',compact('hospitalList'));
	}

	//........get specific hospital
	public function getHospital($id = 0)
	{
		$hospital = User::find($id);
		//........if not found go to search home
		if (!$hospital) {
			return redirect()->route('search.index');
		}
		return view('search.hospital.view',compact('hospital'));
	}
	//........get specific hospital
	public function getHospitalBranch($id = 0,$branch_id = 0)
	{
		$hospital = User::find($id);
		$branch = HosBranch::find($branch_id);
		//........if not found go to search home
		if (!$hospital || !$branch) {
			return redirect()->route('search.index');
		}

		$doctors = Relation::select('relations.*','users.name','users.email')
        ->join('users','relations.doc_id','=','users.user_id')
        ->where('hos_id',$hospital->user_id)
		->where('branch_id',$branch_id)
		->where('status',1)
		->get();

		return view('search.hospital.branch',compact('hospital','branch','doctors'));
	}
}

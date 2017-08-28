<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\User;
use App\Role;
class DoctorsController extends BaseController
{
	//...........open search page
	public function search()
	{
		return view('hospital.doctor.search');
	}
	//..........find doctor according to search
	public function find(Request $request)
	{
		//........search keyword
		$keyword = $request->input('search');
		if (empty($keyword) || $keyword == null) {
			return $this->search();
		}
		//.........role id for doctor
		$role_id = Role::where('name','Doctor')->first()->id;
		//........joining users and doc_basic_infos table
		$doctors = User::select('users.user_id','users.name','users.email','doc_basic_infos.degree','doc_basic_infos.image')
		->leftjoin('doc_basic_infos','doc_basic_infos.user_id','=','users.user_id')
		->where('name','LIKE', '%'.$keyword.'%')
		->where('users.role_id', $role_id)
		->get();

		//........if not found any Data
		if (!count($doctors)) {
			$noData = 'No Data Found !!!';
		}
		return view('hospital.doctor.search',compact('doctors','noData'));
	}
}

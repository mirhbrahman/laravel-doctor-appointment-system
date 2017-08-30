<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\User;
use App\Role;
use App\Model\Relation;

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

	//...........open doctor add page
	public function add($doc_id = 0)
	{
		$doc = User::find($doc_id);
		if(!count($doc)){
			return redirect()->route('hosDoc.search');
		}
		//...........hospital branches
		$branches = $this->user->hosBranches->pluck('name','id')->toArray();
		//...........hospital departmetn
		$depts = $this->user->hosDepts->pluck('name','id')->toArray();
		return view('hospital.doctor.add',compact('doc','branches','depts'));
	}

	//...........sending request to doctor
	public function sendDocRequest(Request $request)
	{
		$this->validate($request,[
			'doc_id'=>'required',
			'branch_id'=>'required|numeric',
			'dept_id'=>'required|numeric'
		],[
			'dept.required'=>'The departmetn field is required.'
		]);
		$input = $request->all();

		//........adding hospital information
		$input['hos_id'] = $this->user->user_id;
		$input['action_user_id'] = $this->user->user_id;

		if (Relation::create($input)) {
			$request->session()->flash('message','Request send.');
		}else{
			$request->session()->flash('message','Request send fail!!!');
		}

		return redirect()->route('hosDoc.search');
	}

	//..........all doctors of the hospital
	public function docList()
	{
		//..........get all doctors of this hospital
		$doctors = Relation::select('relations.*','users.user_id','users.name','users.email')
		->join('users','relations.doc_id','=','users.user_id')
		->where('relations.action_user_id', $this->user->user_id)
		->get();

		return view('hospital.doctor.list',compact('doctors'));
	}

	//..........view hospitals doctor
	public function docShow($id=0)
	{
		//..........get doctors by relation id for view
		$doctor = Relation::select('relations.*','users.user_id','users.name','users.email')
		->join('users','relations.doc_id','=','users.user_id')
		->where('relations.action_user_id', $this->user->user_id)
		->where('relations.id',$id)
		->first();
		return view('hospital.doctor.view',compact('doctor'));
	}
}

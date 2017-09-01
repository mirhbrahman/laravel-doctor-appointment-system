<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Relation;

class RequestController extends BaseController
{
	public function requestList()
	{
		//..........find all panding request for this doctor
		$requestList = Relation::select('relations.*','users.name','users.email')
		->join('users','relations.hos_id','=','users.user_id')
		->where('relations.doc_id',$this->user->user_id)
		->where('status',0)
		->get();

		return view('doctor.request.list',compact('requestList'));
	}

	//..........accept request
	public function accept(Request $request)
	{
		$this->validate($request,[
			'relation_id'=>'required|numeric'
		]);
		$input = $request->all();

		$rel = Relation::where('id',$input['relation_id'])
		->where('doc_id',$this->user->user_id)
		->first();
		if (!count($rel)) {
			return redirect()->route('request.all');
		}

		//..........accepting request...make status=1
		$rel->status = 1;
		if ($rel->update()) {
			return redirect()->route('request.all');
		}
		return redirect()->route('request.all');
	}

	//..........reject request
	public function reject(Request $request)
	{
		$this->validate($request,[
			'relation_id'=>'required|numeric'
		]);
		$input = $request->all();

		$rel = Relation::where('id',$input['relation_id'])
		->where('doc_id',$this->user->user_id)
		->first();
		if (!count($rel)) {
			return redirect()->route('request.all');
		}

		//..........accepting request...make status=1
		$rel->status = 2;
		if ($rel->update()) {
			return redirect()->route('request.all');
		}
		return redirect()->route('request.all');
	}
}

<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Relation;
use App\User;
use App\Model\Hospital\HosDocFee;

class DocFeeController extends BaseController
{
	public function add($rel_id = 0)
	{
		//.........checking relation is true or not
		$rel = Relation::select('relations.*')
		->where('id',$rel_id)
		->where('action_user_id', $this->user->user_id)
		->where('status',1)
		->first();
		if (!count($rel)) {
			return "Don't be over smart.";
		}

		//........if fee not created load default
		$fee = HosDocFee::find($rel->id);
		if (!count($fee)) {
			$fee = $this->getNew();
		}

		//........find doctor whos fee will be add
		$doc = User::find($rel->doc_id);
		return view('hospital.doctor.fee.index',compact('rel','doc','fee'));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$this->validate($request,[
			'rel_id' => 'required|numeric',
			'fee' => 'required|numeric',
		]);

		//.........checking relation is true or not
		$rel = Relation::select('relations.*')
		->where('id',$input['rel_id'])
		->where('action_user_id', $this->user->user_id)
		->where('status',1)
		->first();
		if (!count($rel)) {
			return "Don't be over smart.";
		}

		//........checking fee created or not
		$fee = HosDocFee::find($rel->id);
		if (!count($fee)) {
			//.....create
		}else{
			//.......update
		}

	}

	public function getNew()
	{
		$fee = new HosDocFee();
		$fee->relation_id = null;
		$fee->fee = '';
		$fee->status = 0;

	}
}

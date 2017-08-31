<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Relation;
use App\Model\Hospital\HosDocVisit;
use App\User;
class DocVisitController extends BaseController
{
    public function add($relation_id)
    {
		//.........checking relation is true or not
		$rel = Relation::select('relations.*')
		->where('id',$relation_id)
		->where('action_user_id', $this->user->user_id)
		->where('status',1)
		->first();
		if (!count($rel)) {
			return "Don't be over smart.";
		}

		//........if visit not created load default
		$visit = HosDocVisit::where('relation_id',$rel->id)->first();


		//........find doctor whos visit will be add
		$doc = User::find($rel->doc_id);
		return view('hospital.doctor.visit.index',compact('rel','doc','visit'));
    }


	public function store(Request $request)
	{
		$input = $request->all();

		$this->validate($request,[
			'relation_id' => 'required|numeric',
			]);

		//.........checking relation is true or not
		$rel = Relation::select('relations.*')
		->where('id',$input['relation_id'])
		->where('action_user_id', $this->user->user_id)
		->where('status',1)
		->first();
		if (!count($rel)) {
			return "Don't be over smart.";
		}

		//........checking fee created or not
		$visit = HosDocVisit::where('relation_id',$rel->id)->first();
		if (!count($visit)) {
			//.........create
			if (HosDocVisit::create($input)) {
				$request->session()->flash('message','Visiting hours set successful');
				return redirect()->route('hosDoc.show',$rel->id);
			}else{
				$request->session()->flash('message','Visiting hours set fail!!!');
				return redirect()->route('hosDoc.show',$rel->id);
			}
		}else{
			//..........update
			//.........work leter
		}
	}
}

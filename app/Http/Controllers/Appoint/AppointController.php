<?php

namespace App\Http\Controllers\Appoint;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Relation;
use App\Model\Appoint;

class AppointController extends BaseController
{
	public function index()
	{
		return redirect()->route('home');
	}
    public function requestAppoint(Request $request)
    {
		$this->validate($request,[
			'relation_id'=>'required|numeric',
		]);
    	$input =  $request->all();
		$rel = Relation::find($input['relation_id'])->first();
		if (!$rel) {
			return "Don't be over smart";
		}
		$input['patient_id'] = $this->user->user_id;
		if (Appoint::create($input)) {
			$request->session()->flash('message','Request send.');
			return redirect()->route('search.hospital.branch',[$rel->hos_id,$rel->branch_id]);
		}else{
			$request->session()->flash('message','Request send faild.');
			return redirect()->route('search.hospital.branch',[$rel->hos_id,$rel->branch_id]);
		}
    }
}

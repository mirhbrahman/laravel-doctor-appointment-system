<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\PatientBasicInfoRequest;
use App\Model\Patient\PatientBasicInfo;

class PatientBasicInfoController extends BaseController
{
    public function index()
    {
		$patientInfo = $this->user->patientBasicInfo;
		if(!count($patientInfo)){
			$patientInfo = $this->getNew();
		}
		return view('patient.basicinfo.index',compact('patientInfo'));
    }

	public function edit()
	{
		$patientInfo = $this->user->patientBasicInfo;
		if(!count($patientInfo)){
			$patientInfo = $this->getNew();
		}
		return view('patient.basicinfo.edit',compact('patientInfo'));
	}

	public function store(PatientBasicInfoRequest $request)
    {
		//.......cheking data exit or not
        $patientInfo = $this->user->patientBasicInfo;

		if(!count($patientInfo)){
			//.......create
			$input = $request->all();
			$input['user_id'] = $this->user->user_id;
			if($image = $request->file('image')){
				$name = $this->user->user_id.'_'.time().'.'.$image->getClientOriginalExtension();
				$input['image'] = $name;
				$image->move('uploads/profilePic',$name);
			}
			//.....sending data to DB
			if(PatientBasicInfo::create($input)){
				$request->session()->flash('message','Insert successfull');
				return redirect('patient/basicinfo');
			}else{
				$request->session()->flash('message','Insert fail');
				return redirect('patient/basicinfo');
			}
		}else{
            //....update
			$input = $request->all();
			if($image = $request->file('image')){
				$name = $patientInfo->image;
				if($name != null){
					$input['image'] = $name;
				}else{
					$name = $this->user->user_id.'_'.time().'.'.$image->getClientOriginalExtension();
					$input['image'] = $name;
				}

				$image->move('uploads/profilePic',$name);
			}

			if($patientInfo->update($input)){
				$request->session()->flash('message','Update successfull');
				return redirect('patient/basicinfo');
			}else{
				$request->session()->flash('message','Update fail');
				return redirect('patient/basicinfo');
			}
        }
    }

	//.......default class
	public function getNew(){
		$info = new PatientBasicInfoController();
		$info->phone = "";
		$info->dob = "";
		$info->address="";
		$info->about="";
		$info->image ="";
		return $info;
	}
}

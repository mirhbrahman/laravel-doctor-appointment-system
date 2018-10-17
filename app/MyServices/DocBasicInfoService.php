<?php
namespace App\MyServices;
use App\Model\Doctor\DocBasicInfo;
class DocBasicInfoService
{
	function getDocBasicInfo($user = null){
		$docInfo = $user->docBasicInfo;
		if(!$docInfo){
			$docInfo = $this->getNew();
		}
		return view('doctor.basicinfo.index',compact('docInfo'));
	}

	//..........edit doc info
	public function editDocBasicInfo($user = null){
		$docInfo = $user->docBasicInfo;
		if(!$docInfo){
			$docInfo = $this->getNew();
		}
		return view('doctor.basicinfo.edit',compact('docInfo'));
	}

	//...........insert doc info
	public function insertDocInfo($user = null, $request = null){
		$input = $request->all();
		$input['user_id'] = $user->user_id;
		if($image = $request->file('image')){
			$name = $user->user_id.'_'.time().'.'.$image->getClientOriginalExtension();
			$input['image'] = $name;
			$image->move('uploads/profilePic',$name);
		}
		//.....sending data to DB
		if(DocBasicInfo::create($input)){
			$request->session()->flash('message','Insert successfull');
			return redirect('doctor/basicinfo');
		}else{
			$request->session()->flash('message','Insert fail');
			return redirect('doctor/basicinfo');
		}
	}

	//...........update doc info
	public function updateDocInfo($user = null, $request = null , $docInfo = null){
		$input = $request->all();
		if($image = $request->file('image')){
			$name = $docInfo->image;
			if($name != null){
				$input['image'] = $name;
			}else{
				$name = $user->user_id.'_'.time().'.'.$image->getClientOriginalExtension();
				$input['image'] = $name;
			}

			$image->move('uploads/profilePic',$name);
		}

		if($docInfo->update($input)){
			$request->session()->flash('message','Update successfull');
			return redirect('doctor/basicinfo');
		}else{
			$request->session()->flash('message','Update fail');
			return redirect('doctor/basicinfo');
		}
	}

	//.......default class
	public function getNew(){
		$info = new DocBasicInfoService();
		$info->degree = "";
		$info->phone = "";
		$info->dob = "";
		$info->address="";
		$info->about="";
		$info->image ="";
		return $info;
	}
}

?>

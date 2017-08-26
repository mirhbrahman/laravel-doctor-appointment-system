<?php
namespace App\MyServices;

class DocBasicInfoService
{
	function getDocBasicInfo($user = null){
		return view('doctor.basicinfo.index');
	}

	//.......default class
 public function getNew(){
   $info = new DocInfo();
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

<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

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
}

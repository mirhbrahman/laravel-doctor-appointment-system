<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HosBasicInfoRequest;
use Illuminate\Support\Facades\Auth;
use App\Model\Hospital\HosBasicInfo;

class BasicInfoController extends Controller
{

    public function index()
    {
        $user_id  = Auth::user()->user_id;
        $basicInfo = HosBasicInfo::where('user_id', $user_id)->first();
        return view('hospital.basicInfo.index',compact('basicInfo'));
    }


    public function store(Request $request)
    {
        $input =  $request->all();
        $user_id  = Auth::user()->user_id;
        $basicInfo = HosBasicInfo::where('user_id', $user_id)->first();


        //...........Validation rules
        $roules = [
            'name'=>'required|string|min:2|max:255',
            'email'=>'required|string|email|max:191|unique:hos_basic_infos,email',
            'phone'=>'required|min:8|',
            'address'=>'required|min:3|',
        ];


        if($basicInfo){
            //........update
            //...........modifinig email validation in update
            if($user_id == $basicInfo->user_id){
                $roules['email'] = 'required|string|email|max:191';
            }

            if($basicInfo->update($input)){
                $request->session()->flash('message','Basic info update successfull.');
            }else{
                $request->session()->flash('message','Basic info update fail!!!');
            }
            return redirect()->route('hosBasicInfo.index');
        }else{
            //.......create
            //........validation
            $this->validate($request,$roules);

            $input['user_id'] = $user_id;
            if(HosBasicInfo::create($input)){
                $request->session()->flash('message','Basic info create successfull.');
            }else{
                $request->session()->flash('message','Basic info create fail!!!');
            }
            return redirect()->route('hosBasicInfo.index');
        }

    }


    public function edit()
    {
        $user_id  = Auth::user()->user_id;
        $basicInfo = HosBasicInfo::where('user_id', $user_id)->first();
        if(!$basicInfo){
            //..........send blank data
        }
        return view('hospital.basicInfo.edit',compact('basicInfo'));
    }


}

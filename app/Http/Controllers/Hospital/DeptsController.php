<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Hospital\Department;

class DeptsController extends BaseController
{

    public function index()
    {
        $depts = Department::where('user_id',$this->user->user_id)->get();
        return view('hospital.dept.index',compact('depts'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'name'=>'required|min:2|max:150',
        ],[
            'name.required'=>'The Department name field is required',
        ]);
        //.........adding user id
        $input['user_id'] = $this->user->user_id;
        if(Department::create($input)){
            $request->session()->flash('message','Department create successfull.');
        }else{
            $request->session()->flash('message','Departmetn create fail!!!');
        }

        return redirect()->route('dept.index');

    }


    public function edit($id)
    {
        $dept = Department::
        where('id',$id)
        ->where('user_id',$this->user->user_id)
        ->first();
        return view('hospital.dept.edit',compact('dept'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required|min:2|max:150',
        ],[
            'name.required'=>'The Department name field is required',
        ]);

        //........find department for update
        $dept = Department::
        where('id',$id)
        ->where('user_id',$this->user->user_id)
        ->first();

        $dept->name = $request->input('name');

        if($dept->update()){
            $request->session()->flash('message','Department update successfull.');
        }else{
            $request->session()->flash('message','Departmetn update fail!!!');
        }

        return redirect()->route('dept.index');
    }

    public function destroy(Request $request, $id)
    {
        //........find department for delete
        $dept = Department::
        where('id',$id)
        ->where('user_id',$this->user->user_id)
        ->first();


        if($dept->delete()){
            $request->session()->flash('message','Department delete successfull.');
        }else{
            $request->session()->flash('message','Departmetn delete fail!!!');
        }

        return redirect()->route('dept.index');
    }
}

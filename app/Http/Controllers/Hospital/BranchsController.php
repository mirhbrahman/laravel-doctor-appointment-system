<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\HosBranchRequest;
use App\Model\Hospital\HosBranch;

class BranchsController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $branches = $this->user->hosBranches;
        return view('hospital.branch.index',compact('branches'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('hospital.branch.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(HosBranchRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->user->user_id;
        if (HosBranch::create($input)) {
            $request->session()->flash('message','Branch create successful.');
        }else{
            $request->session()->flash('message','Branch create fail!!!');
        }

        return redirect()->route('branch.index');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $branch = HosBranch::find($id);
        return view('hospital.branch.edit',compact('branch'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(HosBranchRequest $request, $id)
    {
        $branch = HosBranch::find($id);
        if($branch->update($request->all())){
            $request->session()->flash('message','Branch update successfull');
            return redirect('hospital/branch');
        }else{
            $request->session()->flash('message','Branch update fail');
            return redirect('hospital/branch');
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request,$id)
    {
        $branch = HosBranch::find($id);
        if($branch->delete()){
            $request->session()->flash('message','Delete successfull');
            return redirect('hospital/branch');
        }else{
            $request->session()->flash('message','Delete fail');
            return redirect('hospital/branch');
        }
    }
}

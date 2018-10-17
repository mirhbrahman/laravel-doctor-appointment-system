<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\MyServices\DocBasicInfoService;
use App\Http\Requests\DocBasicInfoRequest;
class DoctorBasicInfoController extends BaseController
{
    protected $docBasicInfo;
    public function __construct(DocBasicInfoService $docInfo)
    {
        parent::__construct();
        $this->docBasicInfo = $docInfo;
    }
    public function index()
    {
        return $this->docBasicInfo->getDocBasicInfo($this->user);
    }



    public function store(DocBasicInfoRequest $request)
    {
        //.......cheking data exit or not
        $docInfo = $this->user->docBasicInfo;
        //.......create
        if(!$docInfo){
            return $this->docBasicInfo->insertDocInfo($this->user,$request);
        }else{
            //....update
            return $this->docBasicInfo->updateDocInfo($this->user,$request,$docInfo);
        }
    }



    public function edit()
    {
        return $this->docBasicInfo->editDocBasicInfo($this->user);
    }


}

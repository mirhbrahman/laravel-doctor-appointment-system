<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
  protected $user;
  public function __construct(){
    $this->middleware(function($request,$next){
      $this->user = Auth::user();
      return $next($request);
    });
  }

  public function getRole(){
    return $this->user->userRole->name;
  }

}

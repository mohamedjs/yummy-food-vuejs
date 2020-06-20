<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $main_active = 'home' ;
        $sub_active = 'home' ;
        return view('adminpanel.index',compact('main_active','sub_active'));
    }

    public function showLoginForm()
    {
      $main_active = 'home' ;
      $sub_active = 'home' ;
      return view('adminpanel.auth.login',compact('main_active','sub_active'));
    }

}

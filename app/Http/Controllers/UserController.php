<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminloginView (){
        return view('backend.pages.registration.admin-login');
    }
}

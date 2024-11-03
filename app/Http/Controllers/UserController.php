<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function notPermission()
    {
        return view('common.not_permission');
    }
}

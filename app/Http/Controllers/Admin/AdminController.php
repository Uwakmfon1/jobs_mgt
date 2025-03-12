<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function sidebar()
    {
        return view('admin.admin-layout');
    }

    public function login()
    {
        //code goes in here
    }

}


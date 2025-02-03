<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-header');
    }

    public function sidebar()
    {
        return view('admin.admin-sidebar');
    }

    
}


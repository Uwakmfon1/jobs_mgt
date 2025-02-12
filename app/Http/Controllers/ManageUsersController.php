<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function index()
    {
        //        return view();
    }


    public function users()
    {
        $users = User::where('role_id',2)
            ->get();
        return view('admin.pages.index',[
           'users'=>$users
        ]);
    }

    public function get_user()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function enable()
    {

    }

    public function job()
    {

    }

    public  function password_reset()
    {

    }
}

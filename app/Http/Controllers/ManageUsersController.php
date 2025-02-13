<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('admin.dashboard',[
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

    public function get_clients()
    {
        $clients = User::where('role_id',2)->get();

        return view('admin.pages.clients',[
            'clients'=>$clients
        ]);
    }

    public function get_client($id)
    {
        $client = User::where('id',$id)->get();
        $data = DB::table('users')
                        ->join('jobs','users.id','jobs.client_id')
                        ->where('users.id',$id)
                        ->where('client_id',$id)
//                        ->select('users.*')
                        ->select('jobs.*')
                        ->get();

        return view('admin.pages.client',[
           'client'=>$client,
            'data'=>$data
        ]);

    }
}

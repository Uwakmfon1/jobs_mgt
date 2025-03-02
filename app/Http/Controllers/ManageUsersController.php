<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        $clients = User::with(['latestJob'])->where('role_id',2)->get();
        $clients->transform(function ($user) {
            $user->job_status = $user->latestJob->status ?? 'Coming Soon';
            return $user;
        });


        // $clients = User::where('role_id','!=',1)->where('role_id','!=',3)
        // ->with('jobs')->get();

        return view('admin.pages.clients',[
            'clients'=>$clients,

        ]);
    }


    public function get_client($id)
    {
        $client = User::where('id',$id)->get();


        $data = DB::table('users')
                        ->join('jobs','users.id','jobs.client_id')
                        ->where('users.id',$id)
                        ->where('client_id',$id)
                        ->select(columns: ['users.*','jobs.*'])
                        ->get();


        $description = collect($data)->pluck('description');

        return view('admin.pages.client',[
           'client'=>$data,
            'description'=>$description,
            'id'=>$id
        ]);

    }

    public function get_agents()
    {
        $agents = User::where('role_id','=',3)->get();

        return view('admin.pages.agents',[
            'agents'=>$agents
        ]);
    }

    
    public function get_agent($id)
    {
        $agent = User::where('id','=',$id)->get();

        return view('admin.pages.agent',[
            'agent'=>$agent
        ]);
    }
}

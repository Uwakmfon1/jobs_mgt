<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageJobsController extends Controller
{
    public function pending_contracts()
    {
            $jobs = DB::table('jobs')
            ->join('users as clients', 'jobs.client_id', '=', 'clients.id')
            ->join('users as agents', 'jobs.agent_id', '=', 'agents.id')
            ->select(
                'jobs.*','clients.email as client_email',
                'clients.name as client_name',
                'agents.name as agent_name'
            )
            ->where('jobs.status','pending')
            ->get();
        return view('admin.pages.pending-contracts',[
            'jobs'=>$jobs
        ]);
    }

    public function ongoing_contracts()
    {
        $jobs = DB::table('jobs')
        ->join('users','jobs.client_id','users.id')
        ->select('jobs.*','users.*')
        ->where('jobs.status','in-progress')
        ->get();

        return view('admin.pages.pending-contracts',[
            'jobs'=>$jobs
        ]);
    }
}


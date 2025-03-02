<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

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
            ->paginate(10);


        return view('admin.pages.pending-contracts',[
            'jobs'=>$jobs
        ]);
    }

    public function ongoing_contracts()
    {
        $jobs = DB::table('jobs')
        ->join('users as clients', 'jobs.client_id', '=', 'clients.id')
        ->join('users as agents', 'jobs.agent_id', '=', 'agents.id')
        ->select(
            'jobs.*','clients.email as client_email',
            'clients.name as client_name',
            'agents.name as agent_name'
        )
        ->where('jobs.status','in-progress')
        ->paginate(10);

        return view('admin.pages.ongoing-contracts',[
            'jobs'=>$jobs
        ]);
    }


    public function completed_contracts()
    {
        $jobs = DB::table('jobs')
        ->join('users as clients', 'jobs.client_id', '=', 'clients.id')
        ->join('users as agents', 'jobs.agent_id', '=', 'agents.id')
        ->select(
            'jobs.*','clients.email as client_email',
            'clients.name as client_name',
            'agents.name as agent_name'
        )
        ->where('jobs.status', 'completed')
        ->paginate(10);

        return view('admin.pages.completed-contracts',[
            'jobs'=>$jobs
        ]);
    }


    public function pending_contracts_more_section($id)
    {
        // join the proposal's table with the jobs table and likely the user's table
        // return a page with the data

        $data = DB::table('jobs')->join('proposals','jobs.proposal_id', 'proposals.id')
                // ->select('jobs.*','proposal.*')
                ->where('jobs.id','=',$id)
                ->get();

        return view('admin.pages.pending-contracts-more-section',[
            'data'=>$data
        ]);
    }


    public function ongoing_contracts_staging($id)
    {
        $da = Job::with(['user'])
        ->where('id',$id)
        ->get();
        dd($da);
   }

   public function moved_to_ongoing(Request $request)
   {
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'status'=>'required|string|max:255'
        ]);

        $validated = $validator->validated();

        Job::where('proposal_id',$validated['id'])->update(['status'=>$validated['status']]);

        // Job::findOrFail($validated['id'])->update(['status'=>$validated['status']]);

        return redirect()->route('pending-contracts');
   }

}


@extends('layouts.admin')

@section('content')
    <br><br>
    {{-- <h1>WProposed Contracts</h1> --}}

    <div>
        {{-- <center> --}}
            <h5>{{ $proposal->name }}</h5>
            <p>{{ $job->description }}</p>

            <h5>Assign Agent to the Job</h5>
            <h6>Agent(s) with the Expertise:</h6>
            <ul>
                @dd($agent)
                <li>{{ $agent->name }}</li>
            </ul>
            <a href="#" class="btn btn-secondary">
                Assign Agent
            </a>
        {{-- </center> --}}
    </div>
@endsection

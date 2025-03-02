@extends('layouts.admin')

@section('content')
    <br><br>
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Profile Details</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($agent as $agent_profile)
                <tr>
                    <td>{{ $agent_profile->name }}</td>
                    <td>{{ $agent_profile->email }}</td>
                    <td>{{ $agent_profile->profile_details }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

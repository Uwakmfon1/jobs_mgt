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
            @foreach ($agents as $agent)
                <tr>
                    <td>
                        <a href="{{ url('/admin/agents/' . $agent->id) }}">{{ $agent->name }}</a>
                    </td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->profile_details }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

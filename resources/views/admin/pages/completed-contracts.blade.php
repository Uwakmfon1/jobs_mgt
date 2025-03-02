@extends('layouts.admin')

@section('content')
    <br>
    @if (count($jobs) <=0 )
    <h3>No completed Contracts yet</h3>
    @else
    <h3>Completed Jobs</h3>

    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Agent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                    {{-- <td> title, category_id, description, email, client id agent id, name, email
                        <a href="{{ url('/admin/clients/' . $client->id) }}">{{ $client->name }}</a>
                    </td> --}}
                    <td>{{ $job->title }}</td>
                  <td>{{ $job->description }}</td>
                 <td>{{ $job->client_name }}</td>
                 <td>{{ $job->client_email }}</td>
                 <td>{{ $job->agent_name }}</td>

          </tr>
                @endforeach

        </tbody>
    </table>

    @endif

@endsection

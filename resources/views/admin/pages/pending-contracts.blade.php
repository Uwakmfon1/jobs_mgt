@extends('layouts.admin')

@section('content')
    <br>
    <h4>Pending Contracts</h4>

    @if (count($jobs) <= 0)
    <h2>There are no pending contracts</h2>
    @else
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Agent</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
                          @foreach($jobs as $job)
                          <a href="https://google.com">



                      <tr>
                              {{-- <td> title, category_id, description, email, client id agent id, name, email
                                  <a href="{{ url('/admin/clients/' . $client->id) }}">{{ $client->name }}</a>
                              </td> --}}

                            <td>{{ $job->title }}</td>
                            <td>{{ $job->description }}</td>
                            <td>{{ $job->client_name }}</td>
                            <td>{{ $job->client_email }}</td>
                            <td>{{ $job->agent_name }}</td>
                            <td><a class="btn btn-primary"
                                href="{{ url("admin/pending-contracts/{$job->id}/more") }}">More</a></td>
                            {{-- <td><input type="text" name="job_id" id="#" value="{{ $job->id }}"></td> --}}


                    </tr>
                </a>
                          @endforeach

        </tbody>
    </table>
    @endif

@endsection

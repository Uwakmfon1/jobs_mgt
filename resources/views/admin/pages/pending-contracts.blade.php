@extends('layouts.admin')

@section('content')
    <br>
    <h4>Pending Contracts</h4>

    @if (count($jobs) <= 0)
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2>There are no pending contracts</h2>
    @else
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                @foreach ($jobs as $job)
                    <a href="https://google.com">
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->description }}</td>
                            <td>{{ $job->client_name }}</td>
                            <td>{{ $job->client_email }}</td>
                            <td>{{ $job->agent_name }}</td>
                            <td><a class="btn btn-primary"
                                    href="{{ url("admin/pending-contracts/{$job->id}/more") }}">More</a></td>
                        </tr>
                    </a>
                @endforeach

            </tbody>
        </table>
    @endif

@endsection

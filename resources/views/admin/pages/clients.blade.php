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
        @foreach($clients as $client)
{{--            <a href="{{ url('/admin/client') }}">--}}
                <tr>
                    <td>
                        <a href="{{ url('/admin/clients/'.$client->id) }}">{{ $client->name }}</a></td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->profile_details }}</td>
                </tr>
{{--            </a>--}}

        @endforeach
        </tbody>
    </table>

@endsection


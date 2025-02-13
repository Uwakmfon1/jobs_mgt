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
{{--            @php--}}
{{--                foreach ($client as $client_details){--}}
{{--                    var_dump($client);--}}
{{--                }--}}
{{--            @endphp--}}

        @foreach($client as $client_details)

                <tr>
                    <td>{{ $client_details->name }}</td>
                    <td>{{ $client_details->email }}</td>
                    <td>{{ $client_details->profile_details }}</td>

                </tr>
                <h3>Description of job</h3>
                <p>{{ $data }}</p>
        @endforeach

        </tbody>
    </table>

    <textarea name="" id="" cols="30" rows="10">
        {{ $data }}
    </textarea>
@endsection


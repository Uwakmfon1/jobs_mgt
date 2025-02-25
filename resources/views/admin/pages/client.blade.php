@extends('layouts.admin')

@section('content')

<br><br>

        @foreach($client as $client_details)
        <h5>Name: {{ $client_details->name }}</h5>
        <h5>Email: {{ $client_details->email }}</h5>
        <h5>Profile Details: {{ $client_details->profile_details }}</h5>
        <br>
        <h5>Description of job</h5>
        <textarea name="#" id="#">{{ $client_details->description }}</textarea>
        @endforeach

@endsection


@extends('layouts.admin')

@section('content')
    <br><br>
  <h1>Welcome to Proposed Contracts</h1>

  @foreach ($proposals as $proposal)
    <p>{{ $proposal->name }}</p>
    <a href="{{ url('/admin/proposed-contracts/'.$proposal->id) }}">{{ $proposal->name }}</a>
  @endforeach

@endsection

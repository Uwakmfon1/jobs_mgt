@extends('layouts.admin')

@section('content')
    <br><br>
  <h1>Welcome to Proposed Contracts</h1>

  <div>
    <h5>{{ $proposal->name }}</h5>
      <a href="#" class="btn btn-secondary">
          Assign Agent
      </a>
      Learn how to use ajax to display agent when the button is clicked
  </div>


@endsection

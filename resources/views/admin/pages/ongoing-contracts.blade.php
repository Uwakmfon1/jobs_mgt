@extends('layouts.admin')

@section('content')
    <h2>Ongoing Contracts</h2>
    @if(count($jobs) <=0)
    <br><h3>No Ongoing Contracts</h3>
    @else

    <br>
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Agent</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->description }}</td>
                    <td>{{ $job->client_name }}</td>
                    <td>{{ $job->client_email }}</td>
                    <td>{{ $job->agent_name }}</td>
                    <td>
                        <form class="submitForm" action="{{ url('admin/mark-as-completed/' . $job->id) }}" method="post">
                            @csrf
                                <input type="hidden" value="completed" name="status">

                                <input type="hidden" name="id" value="{{ $job->id }}">
                        </form>
                        <button class="btn btn-primary confirm-action">Mark as Completed</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.confirm-action').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission

                let form = this.closest('td').querySelector('.submitForm');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, continue!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>
@endsection

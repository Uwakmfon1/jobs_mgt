@extends('layouts.admin')

@section('content')
    <br>
    <h4>Pending Contracts More Section</h4>
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
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datum)
                <tr>
                    <td style="font-weight:bold;">Date of Contract Proposal</td>
                    <td>{{ $datum->created_at }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Details of Contract Proposed</td>
                    <td>{{ $datum->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <h3>Payment Status</h3>
    <h5>Not Paid</h5>
    <hr>
    <br>
    <div>
        <h2>Email client</h2>
        {{-- @foreach ($data as $datum)
        <form action="#" method="post">
            <label for="client_email">Client's Email</label>
            <input type="email" value="{{ $datum->email }}"><br>
            <label for="subject">Subject of Message</label><br>
            <input type="text" name="subject" id="subject"><br>

            <label for="message_client">Body of Message</label><br>
            <textarea name="message_client" id="message_client"></textarea> <br>
            <input type="submit" value="submit" style="background: blue; border-radius: 5px;color:white;">
        </form>
        @endforeach --}}
        @foreach ($data as $datum)
        <p>Client Email: {{ $datum->email }}</p>
            {{-- @dd($datum->id) --}}
            <form action="{{ url('admin/send-pending-email', $datum->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Send Payment Reminder</button>
            </form>
        @endforeach
    </div>
    {{-- <a href="{{ url('/admin/send-pending-email') }}" class="btn btn-secondary">Send Email</a> --}}
    <br>
    <hr>
    <div>
        <h2>Next Stages</h2>
        <h4>Client Response Satisfactory?</h4>
        <div style="display:flex;gap:10px;">
            
            @foreach ($data as $datum)
                <form id="submitForm" action="{{ url('admin/moved-to-ongoing/' . $datum->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="in-progress" name="status">
                    <input type="hidden" name="id" value="{{ $datum->id }}">
                </form>

                <button type="submit" class="btn btn-primary" id="confirm-action"
                    data-url="{{ url('admin/moved-to-ongoing/' . $datum->id) }}">
                    Move to Ongoing Contracts
                </button>

                <form id="removeForm" action="{{ url('admin/removed-from-pending/' . $datum->proposal_id) }}" method="post">
                    @csrf
                    <input type="hidden" value="removed" name="status">
                    <input type="hidden" name="id" value="{{ $datum->id }}">
                    <input type="hidden" name="proposal_id" value="{{ $datum->proposal_id }}">
                </form>

                <button type="submit" class="btn btn-secondary" id="remove-action"
                data-url="{{ url('admin/removed-from-pending/' . $datum->proposal_id) }}">
                    Remove from Pending Contracts
                </button>

                {{-- <a href="#" class="btn btn-secondary">Remove from Pending Contracts</a> --}}
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        button = document.getElementById('confirm-action');
        button.addEventListener('click', function(event) {

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
                    document.getElementById('submitForm').submit();
                }
            });
        });


        remove_button = document.getElementById('remove-action');
        remove_button.addEventListener('click', function(event) {

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
                    document.getElementById('removeForm').submit();
                }
            });
        });
    </script>
@endsection

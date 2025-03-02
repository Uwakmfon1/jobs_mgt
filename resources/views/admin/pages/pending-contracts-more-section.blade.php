@extends('layouts.admin')

@section('content')
    <br>
    <h4>Pending Contracts More Section</h4>
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
    <hr>
    <br>
    <div>
        <h2>Email client</h2>
        <form action="#" method="post">
            <label for="subject">Subject of Message</label><br>
            <input type="text" name="subject" id="subject"><br>

            <label for="message_client">Body of Message</label><br>
            <textarea name="message_client" id="message_client"></textarea> <br>
            <input type="submit" value="submit" style="background: blue; border-radius: 5px;color:white;">
        </form>
    </div>
    <br>
    <hr>
    <div>
        <h2>Next Stages</h2>
        <h4>Client Response Satisfactory?</h4>
        <div>
            @foreach ($data as $datum)
                {{-- @dd($datum->id) --}}
                <form id="submitForm" action="{{ url('admin/moved_to_ongoing/' . $datum->id) }}" method="post">
                    @csrf
                        <input type="hidden" value="in-progress" name="status">
                        <input type="hidden" name="id" value="{{ $datum->id }}">
                </form>

                <button type="submit" class="btn btn-primary" id="confirm-action" data-url="{{ url('admin/moved_to_ongoing/' . $datum->id) }}">
                    Move to Ongoing Contracts
                </button>

                <a href="#" class="btn btn-secondary">Remove from Pending Contracts</a>

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
    </script>
@endsection

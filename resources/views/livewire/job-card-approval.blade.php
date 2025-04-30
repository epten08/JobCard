<div class="container mt-5">
    <h2>Pending Job Cards</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($jobCards->count())
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Client</th>
                    <th>Technician</th>
                    <th>Estimated Completion</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobCards as $card)
                    <tr>
                        <td>{{ $card->job_title }}</td>
                        <td>{{ $card->client_name }}</td>
                        <td>{{ $card->assigned_technician }}</td>
                        <td>{{ $card->estimated_completion_date }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $card->status }}</span>
                        </td>
                        <td>
                            <input type="text" class="form-control"
                                   wire:model.defer="comments.{{ $card->id }}"
                                   placeholder="Enter comment">
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                    wire:click="approve({{ $card->id }})">
                                Approve
                            </button>
                            <button class="btn btn-danger btn-sm mt-1"
                                    wire:click="reject({{ $card->id }})">
                                Reject
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pending job cards.</p>
    @endif
</div>

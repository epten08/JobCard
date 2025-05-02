<div class="container mt-4">

    <h2>Job Card Reports</h2>

    <div class="row mt-4 mb-3">
        <div class="col-md-3">
            <label>From Date</label>
            <input type="date" wire:model="from_date" class="form-control" >
        </div>
        <div class="col-md-3">
            <label>To Date</label>
            <input type="date" wire:model="to_date" class="form-control" >
        </div>

       <div class="col-md-3 pt-4">
        <button wire:click="loadData" class="btn btn-primary">Apply Filters</button>
       </div>

    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5>Total</h5>
                    <h3>{{ $total }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h3>{{ $approved }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5>Pending</h5>
                    <h3>{{ $pending }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5>Rejected</h5>
                    <h3>{{ $rejected }}</h3>
                </div>
            </div>
        </div>
    </div>

    @if ($jobCards->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Technician</th>
                    <th>Estimated Completion</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobCards as $card)
                    <tr>
                        <td>{{ $card->job_title }}</td>
                        <td>{{ $card->client_name }}</td>
                        <td>
                            <span class="badge bg-{{ $card->status === 'approved' ? 'success' : ($card->status === 'rejected' ? 'danger' : 'secondary') }}">
                                {{ ucfirst($card->status) }}
                            </span>
                        </td>
                        <td>{{ $card->assigned_technician }}</td>
                        <td>{{ $card->estimated_completion_date }}</td>
                        <td>{{ $card->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No job cards found for the selected date range.</p>
    @endif
</div>

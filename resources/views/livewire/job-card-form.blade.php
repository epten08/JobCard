<div>
    <h2 class="mb-4">Create Job Card</h2>

    <form wire:submit.prevent="submit" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" class="form-control" wire:model.defer="form.job_title">
            @error('form.job_title') <div class="text-danger small">{{ $message }}</div> @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" class="form-control" wire:model.defer="form.client_name">
            @error('form.job_title') <div class="text-danger small">{{ $message }}</div> @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">Job Description</label>
            <textarea class="form-control" wire:model.defer="form.job_description"></textarea>
            @error('form.job_title') <div class="text-danger small">{{ $message }}</div> @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">Assigned Technician</label>
            <input type="text" class="form-control" wire:model.defer="form.assigned_technician">
            @error('form.job_title') <div class="text-danger small">{{ $message }}</div> @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">Estimated Completion Date</label>
            <input type="date" class="form-control" wire:model.defer="form.estimated_completion_date">
            @error('form.job_title') <div class="text-danger small">{{ $message }}</div> @enderror

        </div>

        <button class="btn btn-primary" wire:loading.attr="disabled">
            <span wire:loading.remove>Submit</span>
            <span wire:loading>Submitting...</span>
        </button>

    </form>
</div>

<form wire:submit.prevent="submit" class="p-4 border rounded">
    <label>Job Title</label>
    <input type="text" wire:model.defer="form.job_title" class="form-control mb-2">

    <label>Client Name</label>
    <input type="text" wire:model.defer="form.client_name" class="form-control mb-2">

    <label>Job Description</label>
    <textarea wire:model.defer="form.job_description" class="form-control mb-2"></textarea>

    <label>Assigned Technician</label>
    <input type="text" wire:model.defer="form.assigned_technician" class="form-control mb-2">

    <label>Estimated Completion Date</label>
    <input type="date" wire:model.defer="form.estimated_completion_date" class="form-control mb-2">

    <button type="submit" class="btn btn-primary mt-2">Create Job Card</button>
</form>

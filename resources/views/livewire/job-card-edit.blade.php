<div>
    <h2 class="text-2xl font-bold mb-6">Edit Job Card</h2>

    @if (session()->has('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
        >
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="card p-4 shadow-sm">
        <div class='mb-3'>
            <label class="block font-medium mb-1">Job Title</label>
            <input type="text" wire:model.defer="form.job_title" class="form-control" />
            @error('form.job_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Client Name</label>
            <input type="text" wire:model.defer="form.client_name" class="form-control" />
            @error('form.client_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Assigned Technician</label>
            <input type="text" wire:model.defer="form.assigned_technician"class="form-control" />
            @error('form.assigned_technician') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Description</label>
            <textarea wire:model.defer="form.job_description" rows="4" class="form-control"></textarea>
            @error('form.job_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Estimated Completion Date</label>
            <input type="date" wire:model.defer="form.estimated_completion_date" class="form-control" />
            @error('form.estimated_completion_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="btn btn-success hover:bg-blue-700 text-white px-4 py-2 rounded shadow"  wire:loading.attr="disabled">
                <span wire:loading.remove>Update</span>
            <span wire:loading>Updating...</span>
            </button>


        </div>
    </form>
</div>

<div class="max-w-2xl mx-auto py-8">
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

    <form wire:submit.prevent="update" class="space-y-4 bg-white p-6 rounded shadow">
        <div>
            <label class="block font-medium mb-1">Job Title</label>
            <input type="text" wire:model.defer="form.job_title" class="w-full border border-gray-300 rounded px-3 py-2" />
            @error('form.job_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Client Name</label>
            <input type="text" wire:model.defer="form.client_name" class="w-full border border-gray-300 rounded px-3 py-2" />
            @error('form.client_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Description</label>
            <textarea wire:model.defer="form.description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Estimated Completion Date</label>
            <input type="date" wire:model.defer="form.estimated_completion_date" class="w-full border border-gray-300 rounded px-3 py-2" />
            @error('form.estimated_completion_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Update
            </button>

            <button type="button" wire:click="delete"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow"
                onclick="return confirm('Are you sure you want to delete this job card?')"
            >
                Delete
            </button>
        </div>
    </form>
</div>

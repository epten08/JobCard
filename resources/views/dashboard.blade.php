<div>
    <h2 class="mb-4 text-2xl font-bold">My Job Cards</h2>

    @if (session()->has('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4"
        >
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jobcard.create') }}" class="btn btn-success mb-4">+ Create Job Card</a>

    @if ($jobCards->count())
        <table class="table table-bordered w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Job Title</th>
                    <th class="p-2 text-left">Client Name</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Estimated Completion</th>
                    <th class="p-2 text-left">Created</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobCards as $jobCard)
                    <tr class="border-t">
                        <td class="p-2">{{ $jobCard->job_title }}</td>
                        <td class="p-2">{{ $jobCard->client_name }}</td>
                        <td class="p-2"><span class="badge bg-info">{{ $jobCard->status }}</span></td>
                        <td class="p-2">{{ $jobCard->estimated_completion_date }}</td>
                        <td class="p-2">{{ $jobCard->created_at->format('d M Y') }}</td>
                        <td class="p-2">
                            @if ($jobCard->status !== 'approved')
                                <a href="{{ route('jobcard.edit', $jobCard->id) }}"
                                   class="text-blue-600 hover:underline mr-2">Edit</a>

                                <form action="{{ route('jobcard.delete', $jobCard->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this job card?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            @else
                                <span class="text-gray-500 italic">Locked</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No job cards found.</p>
    @endif
</div>

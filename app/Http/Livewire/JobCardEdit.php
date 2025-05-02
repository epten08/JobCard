<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Repositories\JobCardRepositoryInterface;
use App\Helpers\ValidationHelper;
use App\Models\JobCard;

class JobCardEdit extends Component
{
    public JobCard $jobCard;
    public array $form = [];

    protected ?JobCardRepositoryInterface $repo = null;

    public function mount($id, JobCardRepositoryInterface $repo)
    {
        $this->repo = $repo;

        $this->jobCard = $this->repo->findByUserAndNotApproved($id, Auth::id());

        if (! $this->jobCard) {
            abort(404);
        }

        $this->form = $this->jobCard->only([
            'job_title',
            'client_name',
            'job_description',
            'assigned_technician',
            'estimated_completion_date'
        ]);
    }

    public function update()
    {
        $repo = app(JobCardRepositoryInterface::class);

        $validated = ValidationHelper::validate($this->form);

        $repo->update($this->jobCard->id, $validated);

        return redirect()->route('dashboard')->with('success', 'Job Card updated successfully.');
    }

    public function delete()
    {
        $repo = app(JobCardRepositoryInterface::class);

        $repo->delete($this->jobCard->id);

        return redirect()->route('dashboard')->with('success', 'Job Card deleted successfully.');
    }

    public function render()
    {
        return view('livewire.job-card-edit')->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Repositories\JobCardRepositoryInterface;
use App\Helpers\ValidationHelper;
use App\Models\JobCard;

class JobCardEdit extends Component
{
    public $jobCard;
    public $form = [];

    protected JobCardRepositoryInterface $repo;

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
            'description',
            'estimated_completion_date'
        ]);
    }

    public function update()
    {
        $validated = ValidationHelper::validate($this->form);

        $this->repo->update($this->jobCard->id, $validated);

        return redirect()->route('dashboard')->with('success', 'Job Card updated successfully.');
    }

    public function delete(JobCardRepositoryInterface $repo)
{
    $repo->delete($this->jobCard->id);
    session()->flash('success', 'Job Card Deleted');
    return redirect()->route('dashboard');
}


    public function render()
    {
        return view('livewire.job-card-edit')->layout('layouts.app');
    }
}

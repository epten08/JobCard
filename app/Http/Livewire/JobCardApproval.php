<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repositories\JobCardRepositoryInterface;

class JobCardApproval extends Component {
    public $jobCards;
    public $comments = [];

    protected ?JobCardRepositoryInterface $repo = null;

    public function mount(JobCardRepositoryInterface $repo) {
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function approve(JobCardRepositoryInterface $repo, $id) {
        $repo = app(JobCardRepositoryInterface::class);
        $repo->updateStatus($id, 'approved', $this->comments[$id] ?? null);
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function reject(JobCardRepositoryInterface $repo, $id) {
        $repo = app(JobCardRepositoryInterface::class);
        $repo->updateStatus($id, 'rejected', $this->comments[$id] ?? null);
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function goToReports(){
        return redirect()->route('reports');
    }

    public function render() {
        return view('livewire.job-card-approval')->layout('layouts.app');
    }
}

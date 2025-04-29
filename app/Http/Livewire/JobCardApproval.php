<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repositories\JobCardRepositoryInterface;

class JobCardApproval extends Component {
    public $jobCards;
    public $comments = [];

    public function mount(JobCardRepositoryInterface $repo) {
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function approve(JobCardRepositoryInterface $repo, $id) {
        $repo->updateStatus($id, 'approved', $this->comments[$id] ?? null);
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function reject(JobCardRepositoryInterface $repo, $id) {
        $repo->updateStatus($id, 'rejected', $this->comments[$id] ?? null);
        $this->jobCards = $repo->getByStatus('pending');
    }

    public function render() {
        return view('livewire.job-card-approval')->layout('layouts.app');
    }
}

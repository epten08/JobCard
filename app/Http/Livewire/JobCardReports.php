<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repositories\JobCardRepositoryInterface;

class JobCardReports extends Component {
    public $total;
    public $approved;
    public $pending;
    public $rejected;

    public function mount(JobCardRepositoryInterface $repo) {
        $this->total = $repo->countAll();
        $this->approved = $repo->countByStatus('approved');
        $this->pending = $repo->countByStatus('pending');
        $this->rejected = $repo->countByStatus('rejected');
    }

    public function render() {
        return view('livewire.job-card-reports')->layout('layouts.app');
    }
}

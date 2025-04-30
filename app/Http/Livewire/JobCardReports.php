<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repositories\JobCardRepositoryInterface;
use Carbon\Carbon;

class JobCardReports extends Component
{
    public $from_date;
    public $to_date;

    public $total = 0;
    public $approved = 0;
    public $pending = 0;
    public $rejected = 0;

    public $jobCards = [];

    protected JobCardRepositoryInterface $repo;

    public $listeners = ['refreshComponent' => '$refresh'];

    public function mount(JobCardRepositoryInterface $repo)
    {
        $this->repo = $repo;
        $this->loadData();
    }

    public function updatedFromDate()
    {
        $this->loadData();
    }

    public function updatedToDate()
    {
        $this->loadData();
    }


    public function loadData()
    {
        $this->jobCards = $this->repo->getAllFiltered($this->from_date, $this->to_date);

        $this->total = $this->jobCards->count();
        $this->approved = $this->jobCards->where('status', 'approved')->count();
        $this->pending = $this->jobCards->where('status', 'pending')->count();
        $this->rejected = $this->jobCards->where('status', 'rejected')->count();
    }

    public function render()
    {
        return view('livewire.job-card-reports')->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\ValidationHelper;
use App\Repositories\JobCardRepositoryInterface;

class JobCardForm extends Component {
    public $form = [];

    public function submit(JobCardRepositoryInterface $repo) {
        $validated = ValidationHelper::validate($this->form);
        $repo->create(array_merge($validated, ['status' => 'pending']));
        session()->flash('success', 'Job Card Created');
        $this->form = [];
    }

    public function render() {
        return view('livewire.job-card-form')->layout('layouts.app');
    }
}

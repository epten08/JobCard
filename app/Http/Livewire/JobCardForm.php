<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\ValidationHelper;
use App\Repositories\JobCardRepositoryInterface;

class JobCardForm extends Component {
    public $form = [];

    public function submit(JobCardRepositoryInterface $repo) {
        $validated = ValidationHelper::validate($this->form);
        $repo->create(array_merge($validated, ['status' => 'pending','user_id' => auth()->user()->id]));
        $this->form = [];
        return redirect()->route('dashboard')->with('success', 'Job Card Created');
    }

    public function render() {
        return view('livewire.job-card-form')->layout('layouts.app');
    }
}

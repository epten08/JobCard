<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JobCard;

class JobCardDashboard extends Component {
    public $jobCards;

    public function mount() {
        $this->jobCards = JobCard::where('user_id', auth()->id())->latest()->get();
    }

    public function render() {
        return view('dashboard')->layout('layouts.app');
    }
}

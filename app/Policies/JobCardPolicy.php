<?php
namespace App\Policies;

use App\Models\User;
use App\Models\JobCard;

class JobCardPolicy
{
    public function delete(User $user, JobCard $jobCard)
    {
        // Example rule: allow only if the user owns the job card
        return $user->id === $jobCard->user_id;
    }
}

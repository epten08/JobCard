<?php

namespace App\Http\Controllers;

use App\Models\JobCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobCardController extends Controller
{
    use AuthorizesRequests;

    public function destroy($id): RedirectResponse
    {
        $jobCard = JobCard::findOrFail($id);

        if ($jobCard->status === 'approved') {
            return redirect()->back()->with('error', 'Approved job cards cannot be deleted.');
        }

        $this->authorize('delete', $jobCard);
        $jobCard->delete();

        return redirect()->route('dashboard')->with('success', 'Job Card deleted.');
    }
}

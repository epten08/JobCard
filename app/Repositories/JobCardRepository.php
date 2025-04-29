<?php

namespace App\Repositories;

use App\Models\JobCard;

class JobCardRepository implements JobCardRepositoryInterface {
    public function create(array $data) {
        return JobCard::create($data);
    }

    public function updateStatus($id, $status, $comment) {
        return JobCard::findOrFail($id)->update([
            'status' => $status,
            'admin_comment' => $comment,
        ]);
    }

    public function countByStatus($status) {
        return JobCard::where('status', $status)->count();
    }

    public function countAll() {
        return JobCard::count();
    }

    public function getByStatus($status) {
        return JobCard::where('status', $status)->get();
    }
}

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

    public function findByUserAndNotApproved($id, $userId)
    {
        return JobCard::where('id', $id)
            ->where('user_id', $userId)
            ->where('status', '!=', 'approved')
            ->first();
    }
    public function update($id, array $data)
    {
        return JobCard::where('id', $id)->update($data);
    }

    public function getAllFiltered($from = null, $to = null)
    {
        $query = JobCard::query();

        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }

        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }

        return $query->get(); // Important: use ->get()
    }




}

<?php

namespace App\Repositories;

interface JobCardRepositoryInterface {
    public function create(array $data);
    public function updateStatus($id, $status, $comment);
    public function countByStatus($status);
    public function countAll();
    public function getByStatus($status);
}

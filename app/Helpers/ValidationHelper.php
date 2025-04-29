<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class ValidationHelper {
    public static function validate(array $data) {
        return Validator::make($data, [
            'job_title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'job_description' => 'required|string',
            'assigned_technician' => 'required|string|max:255',
            'estimated_completion_date' => 'required|date',
        ])->validate();
    }
}

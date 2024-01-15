<?php

namespace App\Services;

use App\Models\Job;

/**
 * Job Service
 */
class JobService
{
    public function __construct() {}

    public function getJobsByLanguage($language) {
        // return Job::where('language', $language)->paginate(10);
        return Job::where('language', $language)->get();
    }
}
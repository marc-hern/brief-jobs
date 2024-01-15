<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Facades\Cache;

/**
 * Job Service
 */
class JobService
{
    public function __construct() {}

    public function getJobsByLanguage($language) {
        $jobs = Cache::get('jobs-'.$language);

        // If cache is empty: get from db and place in cache
        if ($jobs == null) {
            $jobs = Job::where('language', $language)->get();
            Cache::put('jobs-'.$language, $jobs, now()->addMinutes(60));
        }

        return $jobs;

        // return Job::where('language', $language)->paginate(10);
        // return Job::where('language', $language)->get();
    }
}
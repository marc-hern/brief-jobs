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
        $cacheKey = CACHE_PREFIX.$language;
        $jobs     = Cache::get($cacheKey);

        // If cache is empty: get from db and place in cache
        if ($jobs == null) {
            $jobs = Job::where('language', $language)->get();
            // $jobs = Job::where('language', $language)->paginate(10);

            Cache::put($cacheKey, $jobs, now()->addMinutes(60));
        }

        return $jobs;
    }
}
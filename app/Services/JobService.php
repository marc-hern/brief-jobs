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

    /**
     * Get jobs from cache: if empty get from db and place in cache
     * @param string $language
     * @return Object
     */
    public function getJobsByLanguage(string $language) : Object{
        $cacheKey = CACHE_PREFIX.$language;
        $jobs     = Cache::get($cacheKey);

        if ($jobs == null) {
            $jobs = Job::where('language', $language)->get();
            // $jobs = Job::where('language', $language)->paginate(10);

            Cache::put($cacheKey, $jobs, now()->addMinutes(60));
        }

        return $jobs;
    }
}
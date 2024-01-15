<?php

namespace App\Invokables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DeleteOldJobs
{
    /**
     * Delete all job postings that are at least JOB_LIVE_TIME_IN_DAYS old
     * Update cache for all supported languages defined in constants.php
     */
    public function __invoke() {
        $test = DB::table('jobs')
            ->whereDate('posted_date', '<=', now()->subDays(env('JOB_LIVE_TIME_IN_DAYS')))
            ->delete();

        foreach (SUPPORTED_LANGUAGES as $language) {
            $jobs = DB::table('jobs')
                ->where('language', '=', $language)->get();
            Cache::put(CACHE_PREFIX.$language, $jobs, now()->addMinutes(60));
        }
    }
}
<?php

namespace App\Invokables;

use Illuminate\Support\Facades\DB;

class DeleteOldJobs
{
    /**
     * Delete all job postings that are at least JOB_LIVE_TIME_IN_DAYS old
     */
    public function __invoke() {
        $test = DB::table('jobs')
            ->whereDate('posted_date', '<=', now()->subDays(env('JOB_LIVE_TIME_IN_DAYS')))
            ->delete();
    }
}
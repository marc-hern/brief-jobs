<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    public function __construct(
        JobService $jobService
    ) {
        $this->jobService = $jobService;
    }

    /**
     * GET /jobs/{language}
     * @param string $language
     * @return array
     */
    public function getJobsByLanguage($language) {
        // Get from cache
        $jobs = Cache::get('jobs-'.$language);

        // If cache is empty: get from db and place in cache
        if ($jobs == null) {
            $jobs = $this->jobService->getJobsByLanguage($language);
            Cache::put('jobs-'.$language, $jobs, now()->addMinutes(60));
        }

        return $jobs;
    }
}

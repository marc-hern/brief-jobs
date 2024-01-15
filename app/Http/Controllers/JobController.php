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
        return $this->jobService->getJobsByLanguage($language);
    }
}

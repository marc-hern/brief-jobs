<?php

namespace App\Http\Controllers;

use Response;
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
     * @return
     */
    public function getJobsByLanguage(string $language) {
        if (!$language) {
            return Response::json(null, 422);
        }

        if (!in_array(strtolower($language), SUPPORTED_LANGUAGES)) {
            return Response::json(null, 422);
        }

        $jobs = $this->jobService->getJobsByLanguage($language);

        return Response::json($jobs, 200);
    }
}

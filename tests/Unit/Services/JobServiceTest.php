<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Mockery;
use App\Service;
use Mockery\MockInterface;
use App\Services\JobService;

class JobServiceTest extends TestCase
{
    public function test_getJobsByLanguage_Php(): void
    {
        $expectedResult = 'PHP';

        $jobService = new JobService;

        $result = $jobService->getJobsByLanguage('PHP');
        $resultLanguage = $result[0]['language'];

        $this->assertSame($resultLanguage, $expectedResult);
    }

    public function test_getJobsByLanguage_JavaScript(): void
    {
        $expectedResult = 'JavaScript';

        $jobService = new JobService;

        $result = $jobService->getJobsByLanguage('JavaScript');
        $resultLanguage = $result[0]['language'];

        $this->assertSame($resultLanguage, $expectedResult);
    }
}

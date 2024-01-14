<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'job_id'       => '12345',
                'title'        => 'Software Engineer',
                'company'      => 'Apple, Inc.',
                'language'     => 'PHP',
                'redirect_url' => 'https://www.google.com/',
                'location'     => 'Remote',
                'posted_date'  => date('Y-m-d',strtotime("-2 days"))
            ],
            [
                'job_id'       => '67890',
                'title'        => 'Sr. Software Engineer',
                'company'      => 'Company, Inc.',
                'language'     => 'PHP',
                'redirect_url' => 'https://www.google.com/',
                'location'     => 'Remote',
                'posted_date'  => date('Y-m-d',strtotime("-1 days"))
            ],
            [
                'job_id'       => 'abcdef',
                'title'        => 'Sr. Software Engineer',
                'company'      => 'Company, Inc.',
                'language'     => 'PHP',
                'redirect_url' => 'https://www.google.com/',
                'location'     => 'Remote',
                'posted_date'  => date('Y-m-d',strtotime("-10 days"))
            ],
            [
                'job_id'       => 'ghijkl',
                'title'        => 'Sr. Software Developer',
                'company'      => 'Company, Inc.',
                'language'     => 'JavaScript',
                'redirect_url' => 'https://www.google.com/',
                'location'     => 'Remote',
                'posted_date'  => date('Y-m-d',strtotime("-1 days"))
            ],
        ];

        foreach($jobs as $job) {
            DB::table('jobs')->insert([
                'job_id'       => $job['job_id'],
                'title'        => $job['title'],
                'company'      => $job['company'],
                'language'     => $job['language'],
                'redirect_url' => $job['redirect_url'],
                'location'     => $job['location'],
                'posted_date'  => $job['posted_date']
            ]);
        }

        \App\Models\Job::factory(150)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

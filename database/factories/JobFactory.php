<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    private $titleOptions = [
        'Software Engineer',
        'Sr. Software Engineer',
        'Software Developer',
        'Senior Software Developer'
    ];

    private $companyOptions = [
        'Apple, Inc.',
        'Google Inc.',
        'Meta',
        'Netflix',
        'Amazon',
        'Dropbox',
        'GitHub Jobs'
    ];

    private $languageOptions = [
        'php',
        'javascript',
        'python',
        'go',
        'java'
    ];

    private $locationOptions = [
        'Remote',
        'Hybrid',
        'On-Site'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id'       => Str::random(15),
            'title'        => $this->titleOptions[rand(0, count($this->titleOptions) - 1)],
            'company'      => $this->companyOptions[rand(0, count($this->companyOptions) - 1)],
            'language'     => $this->languageOptions[rand(0, count($this->languageOptions) - 1)],
            'redirect_url' => 'https://www.google.com/',
            'location'     => $this->locationOptions[rand(0, count($this->locationOptions) - 1)],
            'posted_date'  => date('Y-m-d',strtotime("-".rand(0, 10)." days"))
        ];
    }
}

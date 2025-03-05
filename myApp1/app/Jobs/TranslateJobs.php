<?php

namespace App\Jobs;

use App\Models\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Log\Logger;
use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;

class TranslateJobs implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Jobs $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       Logger('Transalting job : '. $this->jobListing->title);
    }
}

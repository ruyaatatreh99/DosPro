<?php

namespace App\Jobs;

use App\book;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class loadbalace extends Job
{
   use SerializesModels;

    protected $book;
    public function __construct($book $b)
    {
        $this->book=$b;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()//handle method which is called when the job is processed by the queue
    {
        //
    }
}

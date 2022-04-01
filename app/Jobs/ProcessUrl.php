<?php

namespace App\Jobs;

use App\Models\Url;
use App\Services\FetchUrlData;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Url $url)
    {
        //
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FetchUrlData $fetchUrlData)
    {
        $fetchUrlData->updateUrl($this->url);
    }
}

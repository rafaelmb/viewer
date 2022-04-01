<?php

namespace App\Console\Commands;

use App\Jobs\ProcessUrl;
use App\Models\Url;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class UpdateUrlCommand extends Command
{

    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all registered Urls';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $urls = Url::all();

        foreach($urls as $url) {
            ProcessUrl::dispatch($url);
        }

        return 0;
    }
}

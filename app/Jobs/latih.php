<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
class latih implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $cmd;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($command)
    {
        $this->cmd = $command;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        for ($i=0; $i < 100; $i++) { 
            Log::info('test bangsad ' .$i);
        }
        
        // print_r($this->cmd);
    }
}

<?php

namespace Src\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use LiburuGenealogy\PhpDna\Matchkits;

class DispatchMatchkitsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $matchkits;

    public function __construct(Matchkits $matchkits)
    {
        $this->matchkits = $matchkits;
    }

    public function handle()
    {
        // Logic to process matchkits
        $this->matchkits->process();
    }
}

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
        try {
            // Assuming the matchkits class has a method named 'process' for demonstration purposes
            $this->matchkits->process();
        } catch (\Exception $e) {
            // Handle the exception appropriately
        }
    }
}

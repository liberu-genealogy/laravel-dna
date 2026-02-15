<?php

namespace LaravelDna\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Dna\MatchKits;

class DispatchMatchkitsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $matchkits;

    public function __construct(MatchKits $matchkits)
    {
        $this->matchkits = $matchkits;
    }

    public function handle()
    {
        try {
            // Process the match kits - calling matchKits() method from php-dna library
            $this->matchkits->matchKits();
        } catch (\Exception $e) {
            // Handle the exception appropriately
            Log::error('Failed to process matchkits: ' . $e->getMessage());
            throw $e;
        }
    }
}

<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;
use LiburuGenealogy\PhpDna\Matchkits;

class DispatchMatchkitsJob
{
    use Dispatchable;

    public function handle()
    {
        try {
            $matchkits = new Matchkits();
            // Assuming the matchkits class has a method named 'process' for demonstration purposes
            $matchkits->process();
        } catch (\Exception $e) {
            // Handle the exception appropriately
            // This could involve logging the error or dispatching a job to handle the failure scenario
            report($e);
        }
    }
}
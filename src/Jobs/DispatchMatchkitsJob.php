<?php

declare(strict_types=1);

namespace Src\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use LiburuGenealogy\PhpDna\Matchkits;
use Throwable;

final class DispatchMatchkitsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly Matchkits $matchkits
    ) {}

    public function handle(): void
    {
        try {
            $this->matchkits->process();
        } catch (Throwable $e) {
            report($e);
            throw $e;
        }
    }
}
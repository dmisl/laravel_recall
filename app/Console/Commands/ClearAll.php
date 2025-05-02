<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears all trash';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear application cache
        $this->info('Clearing application cache...');
        $this->call('cache:clear');

        // Clear route cache
        $this->info('Clearing route cache...');
        $this->call('route:clear');

        // Clear config cache
        $this->info('Clearing config cache...');
        $this->call('config:clear');

        // Clear view cache
        $this->info('Clearing view cache...');
        $this->call('view:clear');

        // Clear compiled files (if any)
        $this->info('Clearing compiled files...');
        $this->call('clear-compiled');

        // Finished
        $this->info('All caches have been cleared!');
    }
}

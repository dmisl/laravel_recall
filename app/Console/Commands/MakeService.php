<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $servicePath = app_path('Services');

        if (!is_dir($servicePath)) {
            mkdir($servicePath, 0755, true); // create the Services folder if it doesn't exist
        }

        $path = $servicePath . '/' . $name . '.php';

        if (file_exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        file_put_contents($path, "<?php\n\nnamespace App\Services;\n\nclass {$name}\n{\n    //\n}\n");

        $this->info("Service {$name} created successfully.");
    }
}

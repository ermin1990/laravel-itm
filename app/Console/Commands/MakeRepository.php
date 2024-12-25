<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : The name of the repository class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $directory = app_path('Repository');
        $filePath = $directory . '/' . $name . '.php';

        $filesystem = new Filesystem;

        // Provjera i kreiranje foldera ako ne postoji
        if (!$filesystem->exists($directory)) {
            $filesystem->makeDirectory($directory, 0755, true);
            $this->info("Directory 'Repository' created.");
        }

        // Provjera i kreiranje fajla ako ne postoji
        if ($filesystem->exists($filePath)) {
            $this->error("Repository '{$name}' already exists!");
            return Command::FAILURE;
        }

        $stub = $this->getStubContent($name);
        $filesystem->put($filePath, $stub);
        $this->info("Repository '{$name}' created successfully.");

        return Command::SUCCESS;
    }

    /**
     * Get the stub content for the repository class.
     *
     * @param string $name
     * @return string
     */
    protected function getStubContent(string $name): string
    {
        return <<<PHP
<?php

namespace App\Repository;

class {$name}
{
    // Add your repository logic here
}
PHP;
    }
}

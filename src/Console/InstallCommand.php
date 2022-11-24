<?php

namespace Ammar\BreezeBootstrap\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Laravel\Breeze\Console\InstallCommand as BreezeInstallCommand;

class InstallCommand extends BreezeInstallCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bs-breeze:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Breeze controllers and resources';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        parent::installBladeStack();
        $this->installBootstrapStack();

        return Command::SUCCESS;
    }

    /**
     * Install the Blade Breeze stack.
     *
     * @return void
     */
    protected function installBootstrapStack()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    '@popperjs/core' => '^2.11.6',
                    'bootstrap' => '^5.2.3',
                    'autoprefixer' => '^10.4.2',
                    'postcss' => '^8.4.6',
                    'sass' => '^1.56.1',
                    'axios' => '^1.1.2',
                    'laravel-vite-plugin' => '^0.6.0',
                    'lodash' => '.17.19',
                    'vite' => '^3.0.0',
                ];
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../../stubs/default/resources/views', resource_path('views'));

        $fs = new Filesystem();

        if($fs->exists(base_path('tailwind.config.js'))) {
            $fs->delete(base_path('tailwind.config.js'));
        }

        if($fs->exists(base_path('postcss.config.js'))) {
            $fs->delete(base_path('postcss.config.js'));
        }

        if($fs->exists(base_path('vite.config.js'))) {
            $fs->delete(base_path('vite.config.js'));
        }

        copy(__DIR__ . '/../../../stubs/default/vite.config.js', base_path('vite.config.js'));

        // Sass & Js
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../../stubs/default/resources/scss', resource_path('scss'));
        copy(__DIR__ . '/../../../stubs/default/resources/js/app.js', resource_path('js/app.js'));

        $this->runCommands(['npm update', 'npm run build']);

        $this->line('');

        $this->components->info('Breeze bootstrap scaffolding installed successfully.');
    }
}

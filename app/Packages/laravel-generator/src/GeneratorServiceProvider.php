<?php namespace Hopkins\Generator;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/generator.php';

        $this->publishes([
            $configPath => config_path('generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Hopkins\Generator\Commands\PublishCommand',
            'Hopkins\Generator\Commands\MigrationMakeCommand',
            'Hopkins\Generator\Commands\ModelMakeCommand',
            'Hopkins\Generator\Commands\ScaffoldMakeCommand',
            'Hopkins\Generator\Commands\FactoryMakeCommand',
            'Hopkins\Generator\Commands\ResourceMakeCommand'
        );
    }
}

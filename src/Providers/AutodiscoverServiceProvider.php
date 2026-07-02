<?php

namespace VEximweb\Plugin\Autodiscover\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Scheduling\Schedule;
use VEximweb\Plugin\Autodiscover\Services\PublicSuffixListService;

class AutodiscoverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // Bind plugin repositories
        $this->bindRepositories();
        
        // Bind services
        $this->bindServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        
        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }        
    
    }

    /**
     * Bind all repositories to their interfaces.
     */
    protected function bindRepositories(): void
    {
        /*
        $this->app->bind(
            EmailScoreSampleRepositoryInterface::class,
            EmailScoreSampleRepository::class
        );
        */

  
        
    }

    /**
     * Bind all services to the container.
     */
    protected function bindServices(): void
    {
        $this->app->singleton(PublicSuffixListService::class, function ($app) {
            return new PublicSuffixListService();
        });
    }


    
   
}
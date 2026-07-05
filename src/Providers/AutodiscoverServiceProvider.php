<?php
namespace VEximweb\Plugin\Autodiscover\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Scheduling\Schedule;
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
        error_log('AUTODISCOVER: boot() called, object hash=' . spl_object_hash($this));

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $viewsPath = __DIR__.'/../../resources/views';

        if (file_exists($viewsPath)) {
            $this->loadViewsFrom($viewsPath, 'autodiscover');
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
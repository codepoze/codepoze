<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Manual load SEO helper
        $seoHelper = app_path('Helpers/My_seo.php');
        if (file_exists($seoHelper)) {
            require_once $seoHelper;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }
        
        Model::preventLazyLoading(!$this->app->isProduction());
    }
}

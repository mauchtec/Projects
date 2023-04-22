<?php

namespace App\Providers;
use Illuminate\Routing\UrlGenerator;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(UrlGenerator $url)
    {
        if (env('APP_ENV') !== 'local') {
            $url->forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
{
    $this->app['request']->server->set('HTTPS', $this->app->environment() !== 'local');
    $this->app['request']->server->set('SERVER_PORT', 443);
    $this->app['request']->server->set('HTTP_X_FORWARDED_PROTO', 'https');
}

    /**
     * Bootstrap any application services.
     */
    
}

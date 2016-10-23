<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReposServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Blog'
        ];
        foreach ($models as $model) {
            $this->app->bind('App\Repos\{$model}\{$model}Repository', 'App\Repos\{$model}\I{$model}Repository');
        }
        
    }
}

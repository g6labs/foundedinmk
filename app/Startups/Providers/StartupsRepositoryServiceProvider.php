<?php

namespace G6\FoundedInMk\Startups\Providers;

use Illuminate\Support\ServiceProvider;

class StartupsRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'G6\FoundedInMk\Startups\Repositories\StartupsRepositoryInterface',
            'G6\FoundedInMk\Startups\Repositories\EloquentStartupsRepository'
        );
    }
}

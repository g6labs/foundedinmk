<?php

namespace G6\FoundedInMk\Users\Providers;

use Illuminate\Support\ServiceProvider;

class UsersRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'G6\FoundedInMk\Users\Repositories\UsersRepositoryInterface',
            'G6\FoundedInMk\Users\Repositories\EloquentUsersRepository'
        );
    }
}

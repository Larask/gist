<?php
namespace Gist\Repositories;

use Gist\Repositories\Gist\EloquentGistRepository;
use Gist\Repositories\Gist\GistRepository;
use Gist\Repositories\User\EloquentUserRepository;
use Gist\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GistRepository::class,
            EloquentGistRepository::class
        );

        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );
    }

}
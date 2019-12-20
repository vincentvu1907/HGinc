<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Categories\CategoryRepositoryInterface::class,
            \App\Repositories\Categories\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Tags\TagRepositoryInterface::class,
            \App\Repositories\Tags\TagRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Authors\AuthorRepositoryInterface::class,
            \App\Repositories\Authors\AuthorRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Posts\PostRepositoryInterface::class,
            \App\Repositories\Posts\PostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Products\ProductRepositoryInterface::class,
            \App\Repositories\Products\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Specials\SpecialRepositoryInterface::class,
            \App\Repositories\Specials\SpecialRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Customers\CustomerRepositoryInterface::class,
            \App\Repositories\Customers\CustomerRepository::class
        );
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

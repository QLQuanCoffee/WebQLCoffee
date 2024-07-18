<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\Interfaces\CartInterface;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(DetailCartToppingInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(CartInterface::class,CartRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

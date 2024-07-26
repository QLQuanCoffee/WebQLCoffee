<?php

namespace App\Providers;

use App\Models\Type;
use App\Repositories\CartRepository;
use App\Repositories\DetailCartToppingRepository;
use App\Repositories\DetailToppingProductRepository;
use App\Repositories\Interfaces\CartInterface;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\OrderDetailInterface;
use App\Repositories\Interfaces\OrderInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\ShopInterface;
use App\Repositories\Interfaces\ToppingInterface;
use App\Repositories\Interfaces\TypeInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use App\Repositories\ToppingRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterface::class,CartRepository::class);
        $this->app->bind(DetailCartToppingInterface::class,DetailCartToppingRepository::class);
        $this->app->bind(DetailToppingProductInterface::class,DetailToppingProductRepository::class);
        $this->app->bind(OrderInterface::class,OrderRepository::class);
        $this->app->bind(OrderDetailInterface::class,OrderDetailRepository::class);
        $this->app->bind(ProductInterface::class,ProductRepository::class);
        $this->app->bind(ShopInterface::class,ShopRepository::class);
        $this->app->bind(ToppingInterface::class,ToppingRepository::class);
        $this->app->bind(TypeInterface::class,TypeRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

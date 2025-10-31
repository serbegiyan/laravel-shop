<?php

namespace App\Providers;

use App\Models\Basket;
use App\Services\BasketService;
use App\Services\CommentService;
use App\Services\Contracts\BasketServiceInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\NoutbookServiceInterface;
use App\Services\Contracts\RefryServiceInterface;
use App\Services\Contracts\SmartphoneServiceInterface;
use App\Services\NoutbookService;
use App\Services\RefryService;
use App\Services\SmartphoneService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmartphoneServiceInterface::class, SmartphoneService::class);
        $this->app->bind(RefryServiceInterface::class, RefryService::class);
        $this->app->bind(BasketServiceInterface::class, BasketService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(NoutbookServiceInterface::class, NoutbookService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       //
    }
}

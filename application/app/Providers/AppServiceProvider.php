<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\laundry_shop\TblAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(TblAccessToken::class);
    }
}

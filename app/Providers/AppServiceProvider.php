<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//ユニークキーの参照を可能にするためのスキマ呼び
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //使用できるバイト数を増やす
        Schema::defaultStringLength(191);
    }
}

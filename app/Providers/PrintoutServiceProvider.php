<?php

namespace App\Providers;

use App\Services\PrintoutService;
use Illuminate\Support\ServiceProvider;

class PrintoutServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PrintoutService::class, function (){
            return new PrintoutService();
        });
    }

}

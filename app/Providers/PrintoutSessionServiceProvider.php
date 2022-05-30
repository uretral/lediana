<?php

namespace App\Providers;

use App\Services\PrintoutSessionService;
use Illuminate\Support\ServiceProvider;

class PrintoutSessionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PrintoutSessionService::class, function ($size){
            return new PrintoutSessionService();
        });
    }

}

<?php

namespace App\Providers;

use App\Models\Services\MenuType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

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
        \Blade::directive('price', function ($money) {
            return "<?php echo number_format($money, 0, ' ',' '); ?>";
        });
    }
}

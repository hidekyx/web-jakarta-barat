<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Blade::directive('duit', function ($amount) {
            return "<?php echo 'Rp'.number_format($amount); ?>";
        });
        Blade::directive('link', function ($link) {
            return "<?php echo str_replace(' ', '-', strtolower($link)); ?>";
        });
        Blade::directive('unlink', function ($link) {
            return "<?php echo ucwords(str_replace('-', ' ', $link)); ?>";
        });
    }
}

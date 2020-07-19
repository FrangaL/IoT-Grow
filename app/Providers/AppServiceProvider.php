<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        Blade::aliasComponent('components.alert', 'alert');
        Blade::aliasComponent('components.nav', 'nav');
        Blade::if('mode', function ($mode) {
            $modecontrol = file_get_contents(public_path(). '/relay/mode');
            if ($modecontrol == 1) {
                return $mode == 1;
            } elseif ($modecontrol == 0) {
                return $mode == 0;
            }
        });
    }
}

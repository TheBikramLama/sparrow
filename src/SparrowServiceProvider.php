<?php

namespace Thebikramlama\Sparrow;

use Illuminate\Support\ServiceProvider;

class SparrowServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__.'/config/sparrow.php' => config_path('sparrow.php'),
        ]);
    }

    public function boot()
    {
        //
    }
}

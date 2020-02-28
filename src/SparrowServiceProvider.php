<?php

namespace Thebikramlama\Sparrow;

use Illuminate\Support\ServiceProvider;

class SparrowServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->mergeConfigFrom([
            __DIR__.'/config/sparrow.php', 'sparrow'
        ]);

        $this->publishes([
            __DIR__.'/config/sparrow.php' => config_path('sparrow.php'),
        ]);
    }
}

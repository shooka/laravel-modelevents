<?php

namespace Shooka\ModelEvents;

use Illuminate\Support\ServiceProvider;

class ModelEventServiceProvider extends ServiceProvider
{
    protected $listeners = [];

    public function boot()
    {
        $this->publishes([
            $this->simpleProviderPath() => app_path('Providers/ModelEventServiceProvider.php'),
            $this->simpleEventPath() => app_path('ModelEvents/UserEvent.php'),
        ]);

        foreach ($this->listeners() as $model => $listeners) {
            foreach ((array)$listeners as $listener) {
                $model::observe($listener);
            }
        }
    }

    public function listeners()
    {
        return $this->listeners;
    }

    public function register()
    {
        //
    }

    protected function simpleProviderPath()
    {
        return __DIR__ . '/publishes/ServiceProvider.php';
    }

    protected function simpleEventPath()
    {
        return __DIR__ . '/publishes/UserEvent.php';
    }
}

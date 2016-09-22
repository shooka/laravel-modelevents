<?php

namespace Shooka\ModelEvents;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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
        return __DIR__ . '/stubs/provider.stub';
    }

    protected function simpleEventPath()
    {
        return __DIR__ . '/stubs/event.stub';
    }
}

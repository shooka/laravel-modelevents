<?php

namespace Shooka\ModelEvents;

use Illuminate\Support\ServiceProvider;

class ModelEventServiceProvider extends ServiceProvider
{
    protected $listeners = [];

    public function boot()
    {
        foreach ($this->listeners() as $model => $listeners) {
            foreach ($listeners as $listener) {
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
}

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
                $this->registerExternalModelEvent($model, $listener);
            }
        }
    }

    protected function registerExternalModelEvent($model, $listener)
    {
        $event = $this->extractEventFromListener($model, $listener);
        call_user_func([$model, $event], function ($model) use ($listener) {
            return (new $listener)->handle($model);
        });
    }

    protected function extractEventFromListener($model, $listener)
    {
        $model_name = class_basename($model);
        $listener_name = class_basename($listener);

        $exploded_listener_name = explode($model_name, $listener_name, -1);

        return camel_case(implode($model_name, $exploded_listener_name));
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

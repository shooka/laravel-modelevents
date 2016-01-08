<?php

namespace Shooka\ModelEvents\Tests;

use Shooka\ModelEvents\ModelEventServiceProvider as ServiceProvider;

class ModelEventServiceProvider extends ServiceProvider
{
    protected $listeners = [
        Person::class => PersonEvent::class
        
    ];
}

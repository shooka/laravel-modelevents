<?php

namespace Shooka\ModelEvents\Tests;

use Shooka\ModelEvents\ModelEvent;

class CreatingPersonEvent extends ModelEvent
{
    public function handle($person)
    {
        if(!$person->name) {
            return false;
        }
    }
}
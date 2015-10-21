<?php

namespace Shooka\ModelEvents\Tests;

use Shooka\ModelEvents\ModelEvent;

class PersonEvent extends ModelEvent
{
    public function creating(Person $person)
    {
        if(!$person->name) {
            return false;
        }
    }
}

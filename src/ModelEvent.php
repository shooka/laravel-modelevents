<?php

namespace Shooka\ModelEvents;

abstract class ModelEvent
{
    public abstract function handle($model);
}
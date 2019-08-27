<?php

namespace TeamZac\OpenZac\Laravel\Facades;

use TeamZac\OpenZac\OpenZac as Client;
use Illuminate\Support\Facades\Facade;

/**
 * @see \TeamZac\OpenZac\Skeleton\SkeletonClass
 */
class OpenZac extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}

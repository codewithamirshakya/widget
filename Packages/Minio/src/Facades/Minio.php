<?php
namespace AmirShakya\Minio\Facades;

use Illuminate\Support\Facades\Facade;

class Minio extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'minio';
    }
}

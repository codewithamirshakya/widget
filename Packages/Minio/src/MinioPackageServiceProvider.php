<?php
namespace AmirShakya\Minio;

use AmirShakya\Minio\Support\Minio;
use Illuminate\Support\ServiceProvider;

class MinioPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('minio', function($app) {
            return new Minio();
        });
    }

    public function boot()
    {
        //
    }
}

<?php

namespace NotificationChannels\Epochta;

use Illuminate\Support\ServiceProvider;

class EpochtaServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->register(\Enniel\Epochta\EpochtaServiceProvider::class);
    }
}

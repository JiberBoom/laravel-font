<?php

namespace App\Providers;

use App\Libraries\EsEngine;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use Elasticsearch\ClientBuilder as ElasticBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /* EngineManager::class->extend('es', function($app) {
            Log::info('进入了EsEngine2');
            return new EsEngine(ElasticBuilder::create()->setHosts(config('scout.elasticsearch.hosts'))->build(),config('scout.elasticsearch.index')
            );
        });*/
        $this->app['request']->server->set('HTTPS', false);

//        resolve(EngineManager::class)->extend('es', function () {
//            return new EsEngine;
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

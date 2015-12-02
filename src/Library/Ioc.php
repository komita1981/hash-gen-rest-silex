<?php

namespace ZivHashGen\Library;

use Silex\Application;
use ZivHashGen\Controller\HashController;
use ZivHashGen\Service\Hash\GeneratorFactory;

class Ioc
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Adds class to pimple
     *
     * @return bool
     */
    public function boot()
    {
        $this->addControllers();

        $this->addServices();

        $this->addConfig();

        return true;
    }

    private function addControllers()
    {
        $this->app['zhg.controller.hash'] = $this->app->share(function () {
            return new HashController($this->app['zhg.hash_generator_factory'], $this->app['zhg.available_algorithms']);
        });
    }

    private function addConfig()
    {
        $this->app['zhg.hash_generator_factory'] = $this->app->share(function () {
            return new GeneratorFactory($this->app);
        });

        $this->app['zhg.available_algorithms'] = ['md5'];
    }

    private function addServices()
    {
        $this->app['zhg.hash_generator_factory'] = $this->app->share(function () {
            return new GeneratorFactory($this->app);
        });
    }
}
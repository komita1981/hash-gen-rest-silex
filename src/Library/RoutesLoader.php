<?php

namespace ZivHashGen\Library;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Attach routes to controllers defined in services container
     *
     * @return bool
     */
    public function attach()
    {
        $this->app->match("{url}", function ($url) {
            return "OK";
        })->assert('url', '.*')->method("OPTIONS");

        $api = $this->app["controllers_factory"];

        $api->get('/api/v1/hash/{algorithm}', 'zhg.controller.hash:get');

        $this->app->mount('/', $api);

        return true;
    }
}
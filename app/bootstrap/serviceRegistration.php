<?php

use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\MonologServiceProvider;

/**
 * Registering controller service provider - we can use controllers as services
 * Routes and controllers are related in RoutesLoader
 */
$app->register(new ServiceControllerServiceProvider());

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => LOG_PATH . 'silex_dev.log',
));
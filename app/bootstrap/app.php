<?php

use Silex\Application;

// Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// create instance of Silex Application
$app = new Application();

include __DIR__ . '/constants.php';

if (APPLICATION_ENV === DEVELOPMENT_ENV) {
    $app['debug'] = true;
}

if (APPLICATION_ENV === PRODUCTION_ENV) {
    ini_set('display_errors', 0);
}

include __DIR__ . '/ioc.php';

// Load & register services
include __DIR__ . '/serviceRegistration.php';

// Adding event listeners
include __DIR__ . '/listeners.php';

// Loading routes
include __DIR__ . '/routes.php';

// Adding middlewares
include __DIR__ . '/middleware/before.php';

include __DIR__ . '/middleware/after.php';

include __DIR__ . '/middleware/finish.php';

include __DIR__ . '/middleware/error.php';

return $app;
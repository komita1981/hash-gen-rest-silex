<?php

define('BASE_PATH',   __DIR__ . '/../../');
define('APP_PATH',    BASE_PATH . 'app/');
define('SRC_PATH',    BASE_PATH . 'src/');
define('CONFIG_PATH', BASE_PATH . 'config/');
define('CACHE_PATH',  BASE_PATH . 'var/cache/');
define('LOG_PATH',    BASE_PATH . 'var/logs/');

define('DEVELOPMENT_ENV', 'development');
define('PRODUCTION_ENV',  'production');
define('STAGING_ENV',     'staging');
define('TESTING_ENV',     'testing');

defined('APPLICATION_ENV') ||
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : PRODUCTION_ENV));

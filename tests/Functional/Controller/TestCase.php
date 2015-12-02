<?php

namespace ZivHashGen\Test\Functional\Controller;

use Silex\WebTestCase;

class TestCase extends WebTestCase
{
    protected $contentTypeJson = ['HTTP_CONTENT_TYPE' => 'application/json'];

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function createApplication()
    {
        defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'testing');
        require __DIR__ . '/../../../app/bootstrap/app.php';

        $app['debug'] = true;
        $app['session.test'] = true;
        unset($app['exception_handler']);

        return $app;
    }
}
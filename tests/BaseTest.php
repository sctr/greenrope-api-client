<?php

namespace Sctr\Greenrope\Api\Tests;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Sctr\Greenrope\Api\Client;
use Faker\Factory as Faker;

abstract class BaseTest extends TestCase
{
    /** @var Client */
    protected $client;

    /** @var Generator */
    protected $faker;

    public function setUp()
    {
        $loader = require "../vendor/autoload.php";
        AnnotationRegistry::registerLoader(array($loader, "loadClass"));

        $this->faker = Faker::create();

        $this->client = new Client([
            'email' => 'thomas@bang.com',
            'password' => 'SctrApi5!',
            'api_url' => 'https://api.stgi.net/api-xml'
        ]);
    }
}

<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\Tests;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Faker\Factory as Faker;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Sctr\Greenrope\Api\Client;

abstract class BaseTest extends TestCase
{
    /** @var Client */
    protected $client;

    /** @var Generator */
    protected $faker;

    public function setUp()
    {
        $loader = require '../vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);

        $this->faker = Faker::create();

        $this->client = new Client([
            'email'      => 'thomas@bang.com',
            'password'   => 'SctrApi5!',
            'api_url'    => 'https://api.stgi.net/api-xml',
            'account_id' => 45429,
        ]);
    }
}

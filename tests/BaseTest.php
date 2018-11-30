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
use PHPUnit\Framework\TestCase;
use Sctr\Greenrope\Api\Client;

abstract class BaseTest extends TestCase
{
    /** @var Client */
    protected $client;

    public function setUp()
    {
        $loader = require '../vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);

//        shared access user
//        $this->client = new Client([
//            'email'      => 'thomas@bang.com',
//            'password'   => 'SctrApi5!',
//            'api_url'    => 'https://api.stgi.net/api-xml',
//            'account_id' => 45429,
//        ]);

        //owner account
        $this->client = new Client([
            'connection' => [
                'email'      => 'clement@sctr.net',
                'password'   => '55da0MD6V3*v',
                'api_url'    => 'https://api.stgi.net/api-xml',
                'account_id' => 45429,
            ],
            'groups' => [
                'free_users' => ['id' => 1],
            ],
        ]);
    }
}

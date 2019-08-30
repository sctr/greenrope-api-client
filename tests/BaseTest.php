<?php

/*
 * @package greenrope-api-client
 * @license MIT License
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

        //owner account
        $this->client = new Client([
            'connection' => [
                'email'      => 'email@greenrope.com',
                'password'   => 'password',
                'api_url'    => 'https://api.stgi.net/api-xml',
                'account_id' => 45429,
            ],
            'groups' => [
                'free_users' => ['id' => 1],
            ],
        ]);
    }
}

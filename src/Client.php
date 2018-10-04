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

namespace Sctr\Greenrope\Api;

use GuzzleHttp\Client as BaseClient;
use Sctr\Greenrope\Api\Service\GreenropeAuthenticator;

/**
 * @property-read \Sctr\Greenrope\Api\Endpoint\ContactEndpoint $contact
 * @property-read \Sctr\Greenrope\Api\Endpoint\GroupEndpoint $group
 * @property-read \Sctr\Greenrope\Api\Endpoint\BroadcastEndpoint $broadcast
 * @property-read \Sctr\Greenrope\Api\Endpoint\CrmActivityEndpoint $crmActivity
 */
class Client extends BaseClient
{
    /** @var GreenropeAuthenticator */
    private $authenticator;

    public function __construct(array $config = [])
    {
        $this->authenticator = new GreenropeAuthenticator($config);

        $config['base_uri'] = $config['api_url'];
        unset($config['api_url']);

        parent::__construct($config);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function get($name)
    {
        $name  = ucfirst($name);
        $class = '\Sctr\Greenrope\Api\Endpoint\\'.$name.'Endpoint';

        if (!class_exists($class)) {
            throw new \Exception("Endpoint \"{$name}\" does not exist. ");
        }

        return new $class($this, $this->authenticator);
    }
}

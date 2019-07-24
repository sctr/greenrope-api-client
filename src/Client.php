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

    /** @var array */
    private $groups;

    /**
     * @param array         $config
     * @param string|null   $token     pre-seeded token for auth
     * @param callable|null $saveToken takes token string as param, should save with a TTL of two hours
     */
    public function __construct(array $config = [], string $token = null, callable $saveToken = null)
    {
        $connectionData                    = $config['connection'];
        $connectionData['base_uri']        = $connectionData['api_url'];
        $connectionData['connect_timeout'] = 10;
        unset($connectionData['api_url']);

        parent::__construct($connectionData);

        $this->authenticator = new GreenropeAuthenticator($connectionData, $token, $saveToken);

        $this->groups = $config['groups'];
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

    public function getGroup(string $name)
    {
        return $this->groups[$name];
    }
}

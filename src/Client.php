<?php

namespace Sctr\Greenrope\Api;

use GuzzleHttp\Client as BaseClient;

/**
 * @property-read \Sctr\Greenrope\Api\Endpoint\ContactEndpoint $contact
 * @property-read \Sctr\Greenrope\Api\Endpoint\GroupEndpoint $group
 */
class Client extends BaseClient
{
    public function __construct(array $config = [])
    {
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
        $name = ucfirst($name);
        $class = '\Sctr\Greenrope\Api\Endpoint\\' . $name . 'Endpoint';

        if (!class_exists($class)) {
            throw new \Exception("Endpoint \"{$name}\" does not exist. ");
        }

        return new $class($this);
    }
}
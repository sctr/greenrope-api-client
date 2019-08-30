<?php

/*
 * @package greenrope-api-client
 * @license MIT License
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

    public function getAccountIds()
    {
        $response = $this->post($this->getConfig('base_uri'), [
            'form_params' => [
                'email'      => $this->getConfig('email'),
                'auth_token' => $this->authenticator->getAuthToken(),
                'xml'        => '<GetAccountsWithAccessRequest response="json"></GetAccountsWithAccessRequest>',
            ],
        ]);

        $json = json_decode($response->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

        return array_slice(
            array_column($json['getaccountswithaccessresponse']['accounts']['account'], 'accountnumber'),
            1 // filter out account default GreenRope account ID
        );
    }

    public function getGroup(string $name)
    {
        return $this->groups[$name];
    }
}

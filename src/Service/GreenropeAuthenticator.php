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

namespace Sctr\Greenrope\Api\Service;

use GuzzleHttp\Client;
use Sctr\Greenrope\Api\Response\ApiAuthTokenResponse;

class GreenropeAuthenticator extends Client
{
    public const GET_AUTH_TOKEN_XML = '<GetAuthTokenRequest></GetAuthTokenRequest>';

    /** @var XmlSerializer */
    private $xmlSerializer;

    /** @var string */
    private $token;

    public function __construct(array $config)
    {
        $this->xmlSerializer = new XmlSerializer();

        $config['base_uri'] = $config['api_url'];
        unset($config['api_url']);

        parent::__construct($config);
    }

    public function getAuthToken()
    {
        if ($this->token) {
            return $this->token;
        }

        $parameters = [
            'email'    => $this->getConfig('email'),
            'password' => $this->getConfig('password'),
            'xml'      => self::GET_AUTH_TOKEN_XML,
        ];

        $response = $this->post($this->getConfig('base_uri'), ['form_params' => $parameters]);

        /** @var ApiAuthTokenResponse $response */
        $response = $this->xmlSerializer->deserializeXml($response->getBody(), ApiAuthTokenResponse::class);

        if (!empty($token = $response->getResult())) {
            $this->token = $token;

            return $this->token;
        } else {
            throw new \Exception(sprintf('Authentication error: %s', $response->getErrorText()));
        }
    }
}

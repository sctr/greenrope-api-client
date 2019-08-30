<?php

/*
 * @package greenrope-api-client
 * @license MIT License
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

    /** @var callable */
    private $saveToken;

    public function __construct(array $config, string $token = null, callable $saveToken = null)
    {
        $this->xmlSerializer = new XmlSerializer();
        $this->token         = $token;
        $this->saveToken     = $saveToken;

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
            if (is_callable($this->saveToken)) {
                ($this->saveToken)($this->token);
            }

            return $this->token;
        } else {
            throw new \Exception(sprintf('Authentication error: %s', $response->getErrorText()));
        }
    }
}

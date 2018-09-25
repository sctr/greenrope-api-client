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

namespace Sctr\Greenrope\Api\Endpoint;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\Warning;
use Sctr\Greenrope\Api\ApiResponse;
use Sctr\Greenrope\Api\Response\ApiAuthTokenResponse;
use Sctr\Greenrope\Api\Response\GreenropeResponse;
use Sctr\Greenrope\Api\Service\XmlSerializer;

abstract class AbstractEndpoint
{
    public const GET_AUTH_TOKEN_XML = '<GetAuthTokenRequest></GetAuthTokenRequest>';

    public const IRREGULAR_PLURALS = [
        'Company'      => 'Companies',
        'CRM Activity' => 'CRM Activities',
    ];

    /** @var Client */
    protected $client;
    /** @var XmlSerializer */
    protected $xmlConverter;

    /** @var string */
    private $email;
    /** @var string */
    private $password;
    /** @var string */
    private $apiUri;
    /** @var string */
    private $token;

    /**
     * AbstractEndpoint constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->apiUri   = $client->getConfig('base_uri');
        $this->email    = $client->getConfig('email');
        $this->password = $client->getConfig('password');

        $this->xmlConverter = new XmlSerializer();
    }

    /**
     * @param $objectName
     * @param $method - add, get, edit, delete
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return mixed
     */
    protected function handleRequest($objectName, $method, array $parameters = [], $multipleObjects = true, $additionalNameParameters = null)
    {
        if (!$this->token) {
            $this->getAuthToken();
        }

        $apiResponse = new ApiResponse();

        $parameters = $this->buildParametersForRequest($method, $objectName, $parameters, $multipleObjects, $additionalNameParameters);

        $apiResponse->setRequest(new Request('POST', $this->apiUri, [], \GuzzleHttp\json_encode($parameters)));

        $response = $this->client->post($this->apiUri, $parameters);
        $apiResponse->setResponse($response);

        $responseName = $this->generateResponseClassName($objectName, $method, $multipleObjects, $additionalNameParameters);

        /** @var GreenropeResponse $responseObject */
        $responseObject = $this->xmlConverter->deserializeXml($response->getBody(), $responseName);
        if (!$responseObject->getSuccess()) {
            $apiResponse->setException(
                new \Exception(sprintf('An error occured: %s', $responseObject->getErrorText()))
            );
        }

        $apiResponse->setResult($responseObject->getResult());

        return $apiResponse;
    }

    /**
     * Retrieves the auth token.
     *
     * @throws \Exception
     */
    private function getAuthToken()
    {
        $parameters = [
            'email'    => $this->email,
            'password' => $this->password,
            'xml'      => self::GET_AUTH_TOKEN_XML,
        ];

        $response = $this->client->post($this->apiUri, ['form_params' => $parameters]);

        /** @var ApiAuthTokenResponse $response */
        $response = $this->xmlConverter->deserializeXml($response->getBody(), ApiAuthTokenResponse::class);

        if (!empty($token = $response->getResult())) {
            $this->token = $token;
        } else {
            throw new \Exception(sprintf('Authentication error: %s', $response->getErrorText()));
        }
    }

    /**
     * @param $method
     * @param $objectName
     * @param array $parameters
     *
     * @return array
     */
    private function buildParametersForRequest($method, $objectName, array $parameters = [], $multipleObjects = true, $additionalNameParameters = null)
    {
        $requestName = 'Sctr\Greenrope\Api\Request\\'.ucfirst($objectName).'\\'.ucfirst($method).ucfirst($objectName);

        if ($multipleObjects) {
            $requestName .= 's';
        }

        if ($additionalNameParameters) {
            $requestName .= $additionalNameParameters;
        }

        $requestName .= 'Request';

        $request = new $requestName($parameters);

        $xml = $this->xmlConverter->serializeObjectToXml($request);

        $parameters = [
            'form_params' => [
                'email'      => $this->email,
                'auth_token' => $this->token,
                'xml'        => $xml,
            ],
        ];

        return $parameters;
    }

    private function generateResponseClassName($objectName, $method, $mutipleObjects, $additionalNameParameters)
    {
        $responseName = 'Sctr\Greenrope\Api\Response\\'.ucfirst($objectName).'\\'.ucfirst($method).ucfirst($objectName);

        if ($mutipleObjects) {
            $responseName .= 's';
        }

        if ($additionalNameParameters) {
            $responseName .= $additionalNameParameters;
        }

        $responseName .= 'Response';

        return $responseName;
    }
}

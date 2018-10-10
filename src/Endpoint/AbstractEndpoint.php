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
use Sctr\Greenrope\Api\ApiResponse;
use Sctr\Greenrope\Api\Response\GreenropeResponse;
use Sctr\Greenrope\Api\Service\GreenropeAuthenticator;
use Sctr\Greenrope\Api\Service\XmlSerializer;

abstract class AbstractEndpoint
{
    const IRREGULAR_PLURALS = [
        'CrmActivity' => 'CrmActivities',
    ];

    /** @var Client */
    protected $client;
    /** @var XmlSerializer */
    protected $xmlConverter;
    /** @var GreenropeAuthenticator */
    private $authenticator;

    /** @var string */
    private $email;
    /** @var string */
    private $apiUri;
    /** @var int */
    protected $accountId;

    /**
     * AbstractEndpoint constructor.
     *
     * @param Client                 $client
     * @param GreenropeAuthenticator $authenticator
     */
    public function __construct(Client $client, GreenropeAuthenticator $authenticator)
    {
        $this->client        = $client;
        $this->authenticator = $authenticator;
        $this->xmlConverter  = new XmlSerializer();

        $this->apiUri    = $client->getConfig('base_uri');
        $this->email     = $client->getConfig('email');
        $this->accountId = $client->getConfig('account_id');
    }

    /**
     * @param $objectName
     * @param $method - add, get, edit, delete
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    protected function handleRequest($objectName, $method, array $parameters = [], $multipleObjects = true, $additionalNameParameters = null)
    {
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
     * @param $method
     * @param $objectName
     * @param array $parameters
     *
     * @return array
     */
    private function buildParametersForRequest($method, $objectName, array $parameters = [], $multipleObjects = true, $additionalNameParameters = null)
    {
        $requestName = 'Sctr\Greenrope\Api\Request\\'.ucfirst($objectName).'\\'.ucfirst($method);

        if (!$multipleObjects) {
            $requestName .= ucfirst($objectName);
        } elseif (array_key_exists($objectName, self::IRREGULAR_PLURALS)) {
            $requestName .= self::IRREGULAR_PLURALS[$objectName];
        } else {
            $requestName .= ucfirst($objectName).'s';
        }

        if ($additionalNameParameters) {
            $requestName .= $additionalNameParameters;
        }

        $requestName .= 'Request';

        $parameters = array_merge(['accountId' => $this->accountId], $parameters);

        $request = new $requestName($parameters);

        $token = $this->authenticator->getAuthToken();
        $xml   = $this->xmlConverter->serializeObjectToXml($request);

        $parameters = [
            'form_params' => [
                'email'      => $this->email,
                'auth_token' => $token,
                'xml'        => $xml,
            ],
        ];

        return $parameters;
    }

    private function generateResponseClassName($objectName, $method, $multipleObjects, $additionalNameParameters)
    {
        $responseName = 'Sctr\Greenrope\Api\Response\\'.ucfirst($objectName).'\\'.ucfirst($method);

        if (!$multipleObjects) {
            $responseName .= ucfirst($objectName);
        } elseif (array_key_exists($objectName, self::IRREGULAR_PLURALS)) {
            $responseName .= self::IRREGULAR_PLURALS[$objectName];
        } else {
            $responseName .= ucfirst($objectName).'s';
        }

        if ($additionalNameParameters) {
            $responseName .= $additionalNameParameters;
        }

        $responseName .= 'Response';

        return $responseName;
    }
}

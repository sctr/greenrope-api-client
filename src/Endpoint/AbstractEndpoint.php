<?php

namespace Sctr\Greenrope\Api\Endpoint;

use GuzzleHttp\Client;
use Sctr\Greenrope\Api\Response\ApiAuthTokenResponse;
use Sctr\Greenrope\Api\Service\XmlSerializer;

abstract class AbstractEndpoint
{
    /** @var Client  */
    protected $client;

    /** @var XmlSerializer  */
    protected $xmlConverter;

    private $email;
    private $password;
    private $apiUri;
    private $token;

    public const GET_AUTH_TOKEN_XML = '<GetAuthTokenRequest></GetAuthTokenRequest>';

    public const SUCCESSFUL_RESPONSE = 'Success';
    public const ERROR_RESPONSE = 'Error';

    /**
     * AbstractEndpoint constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->apiUri = $client->getConfig('base_uri');
        $this->email = $client->getConfig('email');
        $this->password = $client->getConfig('password');

        $this->xmlConverter = new XmlSerializer();
    }

    private function sendRequest(array $parameters, $returnType)
    {
        if (!$this->token) {
            $this->getAuthToken();
        }

        $parameters = array_merge($parameters, [
            "email" => $this->email,
            'auth_token' => $this->token
        ]);

        $response = $this->client->post( $this->apiUri, [ 'form_params' => $parameters ]);

        return $this->xmlConverter->deserializeXml($response->getBody(), $returnType);
    }

    public function handleRequest($objectName, $method, array $objectParameters = [])
    {
        if (ucfirst($method) === 'Get') {
            $requestName = 'Sctr\Greenrope\Api\Request\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sRequest';
            $request = new $requestName($objectParameters);

            $responseName = 'Sctr\Greenrope\Api\Response\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sResponse';
            $xml = $this->xmlConverter->serializeObjectToXml($request);

            return $this->sendRequest(['xml' => $xml], $responseName);
        }

        $objectsArray = [];
        $fullObjectName = 'Sctr\Greenrope\Api\Model\\' . $objectName;
        foreach ($objectParameters as $arrayParameters) {
            $object = new $fullObjectName($arrayParameters);
            $objectsArray[] = $object;
        }

        $requestName = 'Sctr\Greenrope\Api\Request\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sRequest';
        $request = new $requestName($objectsArray);

        $responseName = 'Sctr\Greenrope\Api\Response\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sResponse';
        $xml = $this->xmlConverter->serializeObjectToXml($request);

        return $this->sendRequest(['xml' => $xml], $responseName);
    }

    /**
     * Retrieves the auth token
     *
     * @throws \Exception
     */
    private function getAuthToken()
    {
        $parameters = [
            'email' => $this->email,
            'password' => $this->password,
            'xml' => self::GET_AUTH_TOKEN_XML
        ];

        $response = $this->client->post( $this->apiUri, [ 'form_params' => $parameters ]);

        /** @var ApiAuthTokenResponse $response */
        $response = $this->xmlConverter->deserializeXml($response->getBody(), ApiAuthTokenResponse::class);

        if ($response->getResult() === self::SUCCESSFUL_RESPONSE && !empty($response->getToken())) {
            $this->token = $response->getToken();
        } else {
            throw new \Exception(sprintf("Authentication error: %s", $response->getErrorText()));
        }
    }
}
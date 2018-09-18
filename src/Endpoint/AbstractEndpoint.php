<?php

namespace Sctr\Greenrope\Api\Endpoint;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Sctr\Greenrope\Api\ApiResponse;
use Sctr\Greenrope\Api\Response\ApiAuthTokenResponse;
use Sctr\Greenrope\Api\Response\GreenropeResponse;
use Sctr\Greenrope\Api\Service\XmlSerializer;

abstract class AbstractEndpoint
{
    public const GET_AUTH_TOKEN_XML = '<GetAuthTokenRequest></GetAuthTokenRequest>';

    /** @var Client  */
    protected $client;
    /** @var XmlSerializer  */
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

        $this->apiUri = $client->getConfig('base_uri');
        $this->email = $client->getConfig('email');
        $this->password = $client->getConfig('password');

        $this->xmlConverter = new XmlSerializer();
    }

    /**
     * @param $objectName
     * @param $method - add, get, edit, delete
     * @param array $parameters
     *
     * @return mixed
     * @throws \Exception
     */
    protected function handleRequest($objectName, $method, array $parameters = [])
    {
        if (!$this->token) {
            $this->getAuthToken();
        }

        $apiResponse = new ApiResponse();

        $parameters = $this->buildParametersForRequest($method, $objectName, $parameters);

        $apiResponse->setRequest(new Request('POST', $this->apiUri, [], \GuzzleHttp\json_encode($parameters)));

        $response = $this->client->post($this->apiUri, $parameters);
        $apiResponse->setResponse($response);

        $responseName = $this->generateResponseClassName($objectName, $method);

        /** @var GreenropeResponse $responseObject */
        $responseObject = $this->xmlConverter->deserializeXml($response->getBody(), $responseName);
        if (!$responseObject->getSuccess()) {
            $apiResponse->setException(
                new \Exception(sprintf("An error occured: %s", $responseObject->getErrorText()))
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
    private function buildParametersForRequest($method, $objectName, array $parameters = [])
    {
        if ($method == 'Get') {
            $objectsArray = $parameters;
            $requestName = 'Sctr\Greenrope\Api\Request\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sRequest';
        } elseif ($method === 'Create') {
            $objectsArray = $parameters;
            $requestName = 'Sctr\Greenrope\Api\Request\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'Request';
        } else {
            $objectsArray = [];
            $fullObjectName = 'Sctr\Greenrope\Api\Model\\' . $objectName;
            foreach ($parameters as $arrayParameters) {
                $object = new $fullObjectName($arrayParameters);
                $objectsArray[] = $object;
            }

            $requestName = 'Sctr\Greenrope\Api\Request\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName) . 'sRequest';
        }

        $request = new $requestName($objectsArray);

        $xml = $this->xmlConverter->serializeObjectToXml($request);

        $parameters =  [
            'form_params' => [
                "email" => $this->email,
                'auth_token' => $this->token,
                'xml' => $xml
            ]
        ];

        return $parameters;
    }

    private function generateResponseClassName($objectName, $method)
    {
        $responseName = 'Sctr\Greenrope\Api\Response\\' . ucfirst($objectName) . '\\' . ucfirst($method) . ucfirst($objectName);
        if ($method !== 'Create') {
            $responseName .=  'sResponse';
        } else {
            $responseName .= 'Response';
        }

        return $responseName;
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

        $response = $this->client->post($this->apiUri, [ 'form_params' => $parameters ]);

        /** @var ApiAuthTokenResponse $response */
        $response = $this->xmlConverter->deserializeXml($response->getBody(), ApiAuthTokenResponse::class);

        if ($response->getSuccess() && !empty($response->getResult())) {
            $this->token = $response->getResult();
        } else {
            throw new \Exception(sprintf("Authentication error: %s", $response->getErrorText()));
        }
    }
}

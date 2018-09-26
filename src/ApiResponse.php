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

use GuzzleHttp\Psr7\Response;
use Sctr\Greenrope\Api\Model\AbstractModel;

class ApiResponse
{
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var \Exception
     */
    private $exception;

    /**
     * @var AbstractModel|array|mixed
     */
    private $result;

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @return array|mixed|AbstractModel
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $request
     *
     * @return ApiResponse
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @param Response $response
     *
     * @return ApiResponse
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @param \Exception $exception
     *
     * @return ApiResponse
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @param array|mixed|AbstractModel $result
     *
     * @return ApiResponse
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }
}

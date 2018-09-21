<?php

namespace Sctr\Greenrope\Api;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Warning;
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

    /** @var Warning */
    private $warning;

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

    /**
     * @return Warning
     */
    public function getWarning()
    {
        return $this->warning;
    }

    /**
     * @param Warning $warning
     */
    public function setWarning(Warning $warning)
    {
        $this->warning = $warning;
    }
}

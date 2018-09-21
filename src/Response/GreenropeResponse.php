<?php

namespace Sctr\Greenrope\Api\Response;

use JMS\Serializer\Annotation as Serializer;

abstract class GreenropeResponse
{
    public const ERROR_RESPONSE = 'Error';

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Result")
     */
    private $success;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ErrorCode")
     */
    private $errorCode;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ErrorText")
     */
    private $errorText;

    /**
     * @return string
     */
    public function getSuccess()
    {
        return $this->success !== self::ERROR_RESPONSE ? true : false;
    }

    /**
     * @return integer
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorText()
    {
        return $this->errorText;
    }

    abstract public function getResult();
}

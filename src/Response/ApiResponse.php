<?php

namespace Sctr\Greenrope\Api\Response;

use JMS\Serializer\Annotation as Serializer;

trait ApiResponse
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Result")
     */
    private $result;

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
    public function getResult()
    {
        return $this->result;
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
}
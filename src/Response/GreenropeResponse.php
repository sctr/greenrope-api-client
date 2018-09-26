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

namespace Sctr\Greenrope\Api\Response;

use JMS\Serializer\Annotation as Serializer;

abstract class GreenropeResponse
{
    public const ERROR_RESPONSE   = 'Error';
    public const SUCCESS_RESPONSE = 'Success';
    public const FAILURE_RESPONSE = 'Failure';

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Result")
     */
    private $success;

    /**
     * @Serializer\Type("string")
     */
    private $response;

    /**
     * @Serializer\Type("integer")
     */
    private $errorCode;

    /**
     * @Serializer\Type("string")
     */
    private $errorText;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    private $message;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    private $result;

    /**
     * @return string
     */
    public function getSuccess()
    {
        $success = false;

        if (empty($this->response) && empty($this->success) && empty($this->result)) {
            $success = true;
        } elseif ($this->response === self::SUCCESS_RESPONSE
            || $this->success === self::SUCCESS_RESPONSE
            || $this->result === self::SUCCESS_RESPONSE
        ) {
            $success = true;
        }

        return $success;
    }

    /**
     * @return int
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
        if ($this->errorText) {
            return $this->errorText;
        }

        if ($this->result === self::FAILURE_RESPONSE && $this->message) {
            return $this->message;
        }
    }

    abstract public function getResult();
}
